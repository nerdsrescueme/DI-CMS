[2012-12-23 11:13:10] App.ERROR: An exception has been thrown during the rendering of a template ("Class alias [activePage] has not been registered") in "template.app.twig" at line 23.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/ControllerAbstract.php(46): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(37): CMS\Controller\ControllerAbstract->after('<div class="row...')
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-23 21:57:39] App.ERROR: The function "cms_asset" does not exist in "template.html.twig" at line 21
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(335): Twig_ExpressionParser->getFunctionNodeClass('cms_asset', 21)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(148): Twig_ExpressionParser->getFunctionNode('cms_asset', 21)
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(85): Twig_ExpressionParser->parsePrimaryExpression()
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(42): Twig_ExpressionParser->getPrimary()
	#4 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(146): Twig_ExpressionParser->parseExpression()
	#5 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(100): Twig_Parser->subparse(NULL, false)
	#6 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(480): Twig_Parser->parse(Object(Twig_TokenStream))
	#7 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(530): Twig_Environment->parse(Object(Twig_TokenStream))
	#8 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(324): Twig_Environment->compileSource('<!DOCTYPE html>...', 'template.html.t...')
	#9 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponseDatabaseObserver.php(22): Twig_Environment->loadTemplate('template.html.t...')
	#10 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponseDatabaseObserver->update(Object(Nerd\Core\Event\Event))
	#11 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#12 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#13 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php",547] []
[2012-12-26 09:47:51] App.ERROR: Unexpected token "operator" of value "/" in "editor/index.app.twig" at line 6
	#0 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\ExpressionParser.php(85): Twig_ExpressionParser->parsePrimaryExpression()
	#1 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\ExpressionParser.php(42): Twig_ExpressionParser->getPrimary()
	#2 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\ExpressionParser.php(463): Twig_ExpressionParser->parseExpression()
	#3 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\ExpressionParser.php(361): Twig_ExpressionParser->parseArguments()
	#4 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\ExpressionParser.php(284): Twig_ExpressionParser->parseSubscriptExpression(Object(Twig_Node_Expression_Name))
	#5 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\ExpressionParser.php(175): Twig_ExpressionParser->parsePostfixExpression(Object(Twig_Node_Expression_Name))
	#6 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\ExpressionParser.php(85): Twig_ExpressionParser->parsePrimaryExpression()
	#7 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\ExpressionParser.php(42): Twig_ExpressionParser->getPrimary()
	#8 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Parser.php(146): Twig_ExpressionParser->parseExpression()
	#9 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\TokenParser\For.php(48): Twig_Parser->subparse(Array)
	#10 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Parser.php(192): Twig_TokenParser_For->parse(Object(Twig_Token))
	#11 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Parser.php(100): Twig_Parser->subparse(NULL, false)
	#12 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Environment.php(480): Twig_Parser->parse(Object(Twig_TokenStream))
	#13 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Environment.php(530): Twig_Environment->parse(Object(Twig_TokenStream))
	#14 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Environment.php(324): Twig_Environment->compileSource('<div class="row...', 'editor/index.ap...')
	#15 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Editor.php(13): Twig_Environment->loadTemplate('editor/index.ap...')
	#16 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Editor->indexAction(NULL)
	#17 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#18 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Event->notify()
	#19 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#20 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\twig\\twig\\lib\\Twig\\ExpressionParser.php",171] []
[2012-12-26 09:48:18] App.ERROR: Undefined index: %7B%7B%20name%7Craw%20%7D%7D
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Editor.php(22): Nerd\{closure}(8, 'Undefined index...', 'C:\XAMPP\htdocs...', 22, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#2 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#3 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Event->notify()
	#4 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#5 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Controller\\Editor.php",22] []
[2012-12-26 09:50:01] App.ERROR: Undefined index: %7B%7B%20name%7Craw%20%7D%7D
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Editor.php(22): Nerd\{closure}(8, 'Undefined index...', 'C:\XAMPP\htdocs...', 22, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#2 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#3 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Event->notify()
	#4 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#5 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Controller\\Editor.php",22] []
[2012-12-26 09:50:07] App.ERROR: Undefined index: %7B%7B%20name%7Craw%20%7D%7D
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Editor.php(22): Nerd\{closure}(8, 'Undefined index...', 'C:\XAMPP\htdocs...', 22, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#2 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#3 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Event->notify()
	#4 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#5 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Controller\\Editor.php",22] []
[2012-12-26 09:50:30] App.ERROR: Undefined index: %7B%7B%20name%7Craw%20%7D%7D
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Editor.php(22): Nerd\{closure}(8, 'Undefined index...', 'C:\XAMPP\htdocs...', 22, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#2 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#3 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Event->notify()
	#4 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#5 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Controller\\Editor.php",22] []
[2012-12-26 09:52:19] App.ERROR: Undefined index: %7B%7B%20name%7Craw%20%7D%7D
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Editor.php(22): Nerd\{closure}(8, 'Undefined index...', 'C:\XAMPP\htdocs...', 22, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#2 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#3 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Event->notify()
	#4 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#5 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Controller\\Editor.php",22] []
[2012-12-26 09:52:41] App.ERROR: Undefined index: %7B%7B%20name%7Craw%20%7D%7D
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Editor.php(22): Nerd\{closure}(8, 'Undefined index...', 'C:\XAMPP\htdocs...', 22, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#2 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#3 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Event->notify()
	#4 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#5 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Controller\\Editor.php",22] []
[2012-12-26 10:35:46] App.ERROR: key() expects parameter 1 to be array, string given
	#0 [internal function]: Nerd\{closure}(2, 'key() expects p...', 'C:\XAMPP\htdocs...', 23, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Content.php(23): key('<p>Region: main...')
	#2 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Content->saveAction(NULL)
	#3 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Event->notify()
	#5 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#6 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Controller\\Content.php",23] []
[2012-12-27 09:17:18] App.ERROR: Class alias [entityManager] has not been registered
	#0 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Container\Container.php(42): Nerd\Core\Container\Container->get('entityManager')
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Content.php(13): Nerd\Core\Container\Container->__get('entityManager')
	#2 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Content->saveAction(NULL)
	#3 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#5 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#6 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\nerdsrescueme\\core\\Nerd\\Core\\Container\\Container.php",34] []
[2012-12-27 09:43:30] App.ERROR: An exception occurred while executing 'INSERT INTO nerd_regions (page_id, `key`, data) VALUES (?, ?, ?)' with params {"1":null,"2":"main","3":"{\"main\":\"<p>Region: main (local)&nbsp;<\/p>\"}"}:

SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'page_id' cannot be null
	#0 C:\XAMPP\htdocs\di\vendor\doctrine\dbal\lib\Doctrine\DBAL\Statement.php(144): Doctrine\DBAL\DBALException::driverExceptionDuringQuery(Object(PDOException), 'INSERT INTO ner...', Array)
	#1 C:\XAMPP\htdocs\di\vendor\doctrine\orm\lib\Doctrine\ORM\Persisters\BasicEntityPersister.php(278): Doctrine\DBAL\Statement->execute()
	#2 C:\XAMPP\htdocs\di\vendor\doctrine\orm\lib\Doctrine\ORM\UnitOfWork.php(935): Doctrine\ORM\Persisters\BasicEntityPersister->executeInserts()
	#3 C:\XAMPP\htdocs\di\vendor\doctrine\orm\lib\Doctrine\ORM\UnitOfWork.php(313): Doctrine\ORM\UnitOfWork->executeInserts(Object(Doctrine\ORM\Mapping\ClassMetadata))
	#4 C:\XAMPP\htdocs\di\vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager.php(373): Doctrine\ORM\UnitOfWork->commit(NULL)
	#5 C:\XAMPP\htdocs\di\application\src\CMS\Event\TeardownListener.php(26): Doctrine\ORM\EntityManager->flush()
	#6 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\ListenerAbstract.php(36): CMS\Event\TeardownListener->run(Object(Nerd\Core\Event\Event))
	#7 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#8 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('teardown', Object(Nerd\Core\Event\Event))
	#9 C:\XAMPP\htdocs\di\public\development.php(75): Nerd\Core\Event\Dispatcher->dispatch('teardown', Object(Nerd\Core\Event\Event))
	#10 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#11 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\DBALException.php",47] []
[2012-12-27 09:56:16] App.ERROR: Undefined property: CMS\Model\Page::$_entityPersister
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Model\Page.php(317): Nerd\{closure}(8, 'Undefined prope...', 'C:\XAMPP\htdocs...', 317, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Content.php(23): CMS\Model\Page->getGlobal('tbp-footer-1')
	#2 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Content->saveAction(NULL)
	#3 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#5 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#6 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Model\\Page.php",317] []
[2012-12-27 10:12:59] App.ERROR: An exception has been thrown during the rendering of a template ("Undefined variable: key") in "template.html.twig" at line 53.
	#0 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 C:\XAMPP\htdocs\di\application\storage\cache\71\1a\7a59339512478f1cd1d0cdc6738d.php(103): Twig_Template->display(Array)
	#2 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Template.php(265): __TwigTemplate_711a7a59339512478f1cd1d0cdc6738d->doDisplay(Array, Array)
	#3 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#4 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Template.php(250): Twig_Template->display(Array)
	#5 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponseDatabaseObserver.php(30): Twig_Template->render(Array)
	#6 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponseDatabaseObserver->update(Object(Nerd\Core\Event\Event))
	#7 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#8 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#9 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\twig\\twig\\lib\\Twig\\Template.php",280] []
[2013-01-08 12:00:50] App.ERROR: Undefined property: CMS\Model\Site::$getTheme
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Event\SetupTemplateListener.php(34): Nerd\{closure}(8, 'Undefined prope...', 'C:\XAMPP\htdocs...', 34, Array)
	#1 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\ListenerAbstract.php(36): CMS\Event\SetupTemplateListener->run(Object(Nerd\Core\Event\Event))
	#2 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#3 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('setup', Object(Nerd\Core\Event\Event))
	#4 C:\XAMPP\htdocs\di\public\development.php(64): Nerd\Core\Event\Dispatcher->dispatch('setup', Object(Nerd\Core\Event\Event))
	#5 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#6 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Event\\SetupTemplateListener.php",34] []
[2013-01-08 12:03:29] App.ERROR: C:\XAMPP\htdocs\di\application\themes\tbp\views
	#0 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\ListenerAbstract.php(36): CMS\Event\SetupTemplateListener->run(Object(Nerd\Core\Event\Event))
	#1 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#2 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('setup', Object(Nerd\Core\Event\Event))
	#3 C:\XAMPP\htdocs\di\public\development.php(64): Nerd\Core\Event\Dispatcher->dispatch('setup', Object(Nerd\Core\Event\Event))
	#4 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#5 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Event\\SetupTemplateListener.php",27] []
[2013-01-08 14:43:13] App.ERROR: Object of class CMS\Controller\Site could not be converted to string
	#0 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(32): Nerd\{closure}(4096, 'Object of class...', 'C:\XAMPP\htdocs...', 32, Array)
	#1 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#2 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#3 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#4 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Event\\ResponsePathObserver.php",32] []
[2013-01-08 14:44:23] App.ERROR: Action [1Action] does not exist in controller
	#0 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#1 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#2 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#3 {main}
	 ["C:\\XAMPP\\htdocs\\di\\application\\src\\CMS\\Event\\ResponsePathObserver.php",32] []
[2013-01-08 14:46:58] App.ERROR: Unable to find template "site/edit.app.twig" (looked into: C:\XAMPP\htdocs\di\application\themes\tbp\views, C:\XAMPP\htdocs\di\application\themes\default\views, C:\XAMPP\htdocs\di\application\views).
	#0 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Loader\Filesystem.php(134): Twig_Loader_Filesystem->findTemplate('site/edit.app.t...')
	#1 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Environment.php(266): Twig_Loader_Filesystem->getCacheKey('site/edit.app.t...')
	#2 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Environment.php(313): Twig_Environment->getTemplateClass('site/edit.app.t...', NULL)
	#3 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Site.php(9): Twig_Environment->loadTemplate('site/edit.app.t...')
	#4 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Site->editAction('1')
	#5 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#6 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#7 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#8 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\twig\\twig\\lib\\Twig\\Loader\\Filesystem.php",198] []
[2013-01-08 14:47:10] App.ERROR: Argument 1 passed to Twig_Template::render() must be of the type array, none given, called in C:\XAMPP\htdocs\di\application\src\CMS\Controller\Site.php on line 11 and defined
	#0 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Template.php(245): Nerd\{closure}(4096, 'Argument 1 pass...', 'C:\XAMPP\htdocs...', 245, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Site.php(11): Twig_Template->render()
	#2 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Site->editAction('1')
	#3 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#5 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#6 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\twig\\twig\\lib\\Twig\\Template.php",245] []
[2013-01-08 14:47:26] App.ERROR: Argument 1 passed to Twig_Template::render() must be of the type array, none given, called in C:\XAMPP\htdocs\di\application\src\CMS\Controller\Site.php on line 12 and defined
	#0 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Template.php(245): Nerd\{closure}(4096, 'Argument 1 pass...', 'C:\XAMPP\htdocs...', 245, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Site.php(12): Twig_Template->render()
	#2 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Site->editAction('1')
	#3 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#5 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#6 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\twig\\twig\\lib\\Twig\\Template.php",245] []
[2013-01-08 14:47:32] App.ERROR: Argument 1 passed to Twig_Template::render() must be of the type array, none given, called in C:\XAMPP\htdocs\di\application\src\CMS\Controller\Site.php on line 12 and defined
	#0 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Template.php(245): Nerd\{closure}(4096, 'Argument 1 pass...', 'C:\XAMPP\htdocs...', 245, Array)
	#1 C:\XAMPP\htdocs\di\application\src\CMS\Controller\Site.php(12): Twig_Template->render()
	#2 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(36): CMS\Controller\Site->editAction('1')
	#3 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#5 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#6 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\twig\\twig\\lib\\Twig\\Template.php",245] []
[2013-01-08 14:54:05] App.ERROR: Unclosed "(" in "template.app.twig" at line 40
	#0 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Lexer.php(217): Twig_Lexer->lexExpression()
	#1 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Lexer.php(118): Twig_Lexer->lexVar()
	#2 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Environment.php(444): Twig_Lexer->tokenize('<!DOCTYPE html>...', 'template.app.tw...')
	#3 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Environment.php(530): Twig_Environment->tokenize('<!DOCTYPE html>...', 'template.app.tw...')
	#4 C:\XAMPP\htdocs\di\vendor\twig\twig\lib\Twig\Environment.php(324): Twig_Environment->compileSource('<!DOCTYPE html>...', 'template.app.tw...')
	#5 C:\XAMPP\htdocs\di\application\src\CMS\Controller\ControllerAbstract.php(37): Twig_Environment->loadTemplate('template.app.tw...')
	#6 C:\XAMPP\htdocs\di\application\src\CMS\Event\ResponsePathObserver.php(35): CMS\Controller\ControllerAbstract->before()
	#7 C:\XAMPP\htdocs\di\vendor\nerdsrescueme\core\Nerd\Core\Event\Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#8 C:\XAMPP\htdocs\di\public\development.php(68): Nerd\Core\Event\Event->notify()
	#9 C:\XAMPP\htdocs\di\public\index.php(3): include('C:\XAMPP\htdocs...')
	#10 {main}
	 ["C:\\XAMPP\\htdocs\\di\\vendor\\twig\\twig\\lib\\Twig\\Lexer.php",265] []
