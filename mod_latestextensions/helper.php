<?php 
	defined('_JEXEC') or die;

	abstract class mod_latestextensionsHelper
	/* The class is ABSTRACT because we are never going to create a mod_latestextensionsHelper object, 
		we are only ever going to call the static function directly. */
	{
		public static function getList(&$params)
		/*  Static methods and properties in php are directly accessible without creating object of class.  */
		/*  helper class only contains one function, getList(), which will query your database and load up the data that will be displayed in the module*/
		{
			$db = JFactory::getDbo();
			//establish a connection to the database
			/* Joomla! is smart enough to know what database we are using based on our configuration.php file which stores the global
			configuration of our site and has all the database connection details. There is no need
			to supply a username and password, which is all done for you by Joomla!. */
			 
			$query = $db->getQuery(true);
			/* The "true" parameter in the getQuery() states that we are starting a new query and not continuing a previous one. */
			
			$query->select('name, extension_id, type');
			$query->from('#__extensions');
			/* Note that you should use #__ to represent the database prefix rather than hardcode it; Joomla! knows to do a look up of your configuration.
			php and replace #__ with your actual database table prefix. */
			
			$query->order('extension_id DESC');
			/* Now we are also sorting the results by the extension_id column, as each time you install a new extension, it is given the next number in sequence, 
			so we know that the extension with the highest extension_id number is the most recently installed. This is why we are sorting in descending order 				            indicated by DESC. */
			
			$db->setQuery($query, 0, $params->get('count', 5));
			/* Now that the query is prepared, we can execute the query on the database and pass a limit value based on our count parameter which will limit the 		            number of results returned. */
			try
			{
				$results = $db->loadObjectList();
				/* Now that the query is prepared, we can execute the query on the database and pass a limit value based on our count parameter which will limit the 			                   number of results returned. */
			}	
			catch (RuntimeException $e) 
			{
				JError::raiseError(500, $e->getMessage());
				return false;
			}
			
/* dppo aver effettuato tutte le queries al DB occorre un array per stampare tutti i risultati nella VIEW */			
			foreach ($results as $k => $result)
			/* Since we have loaded up the results from the database query into the $results
variable, we can look through these and prepare an array that we will pass to our
view so it can display the data */

			{
				$results[$k] = new stdClass;
				$results[$k]->name = htmlspecialchars( $result->name );
				/* Notice the use of htmlspecialchars function, which
will convert any HTML code in these fields into text content rather than interpreting
the content as HTML. For example, & would be converted to &amp; or > would be
changed to &gt;. */
				$results[$k]->id = (int)$result->extension_id;
				$results[$k]->type = htmlspecialchars( $result->type);
			}
			
			return $results;
			/* The data is now ready for our view, so let's return it as return $results; */
		}
	} /* chiusura Classe mod_latestextensionsHelper */