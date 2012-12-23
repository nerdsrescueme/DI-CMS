[2012-12-21 21:15:02] App.ERROR: Controller [\CMS\Controller\Editor] does not exist
	#0 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#1 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#2 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#3 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php",24] []
[2012-12-21 21:45:57] App.ERROR: Controller [\CMS\Controller\Src] does not exist
	#0 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#1 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#2 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#3 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php",24] []
[2012-12-21 21:45:57] App.ERROR: Controller [\CMS\Controller\Src] does not exist
	#0 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#1 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#2 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#3 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php",24] []
[2012-12-21 21:45:57] App.ERROR: Controller [\CMS\Controller\Src] does not exist
	#0 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#1 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#2 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#3 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php",24] []
[2012-12-21 23:23:28] App.ERROR: Unexpected token "operator" of value ".." in "editor/index.app.twig" at line 38
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(85): Twig_ExpressionParser->parsePrimaryExpression()
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(42): Twig_ExpressionParser->getPrimary()
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/TokenParser/Include.php(33): Twig_ExpressionParser->parseExpression()
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(192): Twig_TokenParser_Include->parse(Object(Twig_Token))
	#4 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(100): Twig_Parser->subparse(NULL, false)
	#5 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(480): Twig_Parser->parse(Object(Twig_TokenStream))
	#6 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(530): Twig_Environment->parse(Object(Twig_TokenStream))
	#7 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(324): Twig_Environment->compileSource('<div class="row...', 'editor/index.ap...')
	#8 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(10): Twig_Environment->loadTemplate('editor/index.ap...')
	#9 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->indexAction(NULL)
	#10 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#11 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#12 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#13 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php",171] []
[2012-12-22 13:04:12] App.ERROR: Unexpected character "$" in "editor/index.app.twig" at line 5
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Lexer.php(206): Twig_Lexer->lexExpression()
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Lexer.php(114): Twig_Lexer->lexBlock()
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(444): Twig_Lexer->tokenize('<div class="row...', 'editor/index.ap...')
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(530): Twig_Environment->tokenize('<div class="row...', 'editor/index.ap...')
	#4 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(324): Twig_Environment->compileSource('<div class="row...', 'editor/index.ap...')
	#5 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(13): Twig_Environment->loadTemplate('editor/index.ap...')
	#6 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->indexAction(NULL)
	#7 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#8 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#9 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#10 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Lexer.php",285] []
[2012-12-22 13:04:19] App.ERROR: Unknown tag name "foreach" in "editor/index.app.twig" at line 5
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(100): Twig_Parser->subparse(NULL, false)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(480): Twig_Parser->parse(Object(Twig_TokenStream))
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(530): Twig_Environment->parse(Object(Twig_TokenStream))
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(324): Twig_Environment->compileSource('<div class="row...', 'editor/index.ap...')
	#4 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(13): Twig_Environment->loadTemplate('editor/index.ap...')
	#5 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->indexAction(NULL)
	#6 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#7 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#8 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#9 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php",187] []
[2012-12-22 13:15:25] App.ERROR: Object of class CMS\Controller\Editor could not be converted to string
	#0 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(32): Nerd\{closure}(4096, 'Object of class...', '/Users/frankbar...', 32, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#2 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#3 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#4 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php",32] []
[2012-12-22 13:16:23] App.ERROR: preg_match(): Compilation failed: syntax error in subpattern name (missing terminator) at offset 44
	#0 [internal function]: Nerd\{closure}(2, 'preg_match(): C...', '/Users/frankbar...', 411, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/aura/router/src/Aura/Router/Route.php(411): preg_match('#^/(?P<area>adm...', '/admin/editor/m...', NULL)
	#2 /Users/frankbardon/Work/Nerd/vendor/aura/router/src/Aura/Router/Route.php(285): Aura\Router\Route->isRegexMatch('/admin/editor/m...')
	#3 /Users/frankbardon/Work/Nerd/vendor/aura/router/src/Aura/Router/Map.php(186): Aura\Router\Route->isMatch('/admin/editor/m...', Array)
	#4 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/RoutePathListener.php(39): Aura\Router\Map->match('/admin/editor/m...', Array)
	#5 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/ListenerAbstract.php(36): CMS\Event\RoutePathListener->run(Object(Nerd\Core\Event\Event))
	#6 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#7 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('router', Object(Nerd\Core\Event\Event))
	#8 /Users/frankbardon/Work/Nerd/public/development.php(72): Nerd\Core\Event\Dispatcher->dispatch('router', Object(Nerd\Core\Event\Event))
	#9 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#10 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/aura/router/src/Aura/Router/Route.php",411] []
[2012-12-22 13:16:23] App.ERROR: preg_match(): Compilation failed: syntax error in subpattern name (missing terminator) at offset 44
	#0 [internal function]: Nerd\{closure}(2, 'preg_match(): C...', '/Users/frankbar...', 411, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/aura/router/src/Aura/Router/Route.php(411): preg_match('#^/(?P<area>adm...', '/favicon.ico', NULL)
	#2 /Users/frankbardon/Work/Nerd/vendor/aura/router/src/Aura/Router/Route.php(285): Aura\Router\Route->isRegexMatch('/favicon.ico')
	#3 /Users/frankbardon/Work/Nerd/vendor/aura/router/src/Aura/Router/Map.php(186): Aura\Router\Route->isMatch('/favicon.ico', Array)
	#4 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/RoutePathListener.php(39): Aura\Router\Map->match('/favicon.ico', Array)
	#5 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/ListenerAbstract.php(36): CMS\Event\RoutePathListener->run(Object(Nerd\Core\Event\Event))
	#6 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#7 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('router', Object(Nerd\Core\Event\Event))
	#8 /Users/frankbardon/Work/Nerd/public/development.php(72): Nerd\Core\Event\Dispatcher->dispatch('router', Object(Nerd\Core\Event\Event))
	#9 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#10 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/aura/router/src/Aura/Router/Route.php",411] []
[2012-12-22 13:22:22] App.ERROR: array_merge(): Argument #1 is not an array
	#0 [internal function]: Nerd\{closure}(2, 'array_merge(): ...', '/Users/frankbar...', 20, Array)
	#1 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(20): array_merge(Object(stdClass), Object(stdClass))
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#3 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#5 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#6 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php",20] []
[2012-12-22 13:24:04] App.ERROR: Unable to find template "template.html" (looked into: /Users/frankbardon/Work/Nerd/application/themes/tbp/views, /Users/frankbardon/Work/Nerd/application/themes/default/views, /Users/frankbardon/Work/Nerd/application/views).
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Loader/Filesystem.php(134): Twig_Loader_Filesystem->findTemplate('template.html')
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(266): Twig_Loader_Filesystem->getCacheKey('template.html')
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(313): Twig_Environment->getTemplateClass('template.html', NULL)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(25): Twig_Environment->loadTemplate('template.html')
	#4 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#5 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#6 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#7 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#8 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Loader/Filesystem.php",198] []
[2012-12-22 13:24:25] App.ERROR: Undefined index: maintwig
	#0 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(22): Nerd\{closure}(8, 'Undefined index...', '/Users/frankbar...', 22, Array)
	#1 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#2 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#3 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#4 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#5 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php",22] []
[2012-12-22 13:24:37] App.ERROR: Argument 1 passed to Twig_Template::render() must be of the type array, none given, called in /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php on line 27 and defined
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(245): Nerd\{closure}(4096, 'Argument 1 pass...', '/Users/frankbar...', 245, Array)
	#1 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(27): Twig_Template->render()
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#3 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#5 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#6 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",245] []
[2012-12-22 13:24:43] App.ERROR: Unable to find template ".html.twig" (looked into: /Users/frankbardon/Work/Nerd/application/themes/tbp/views, /Users/frankbardon/Work/Nerd/application/themes/default/views, /Users/frankbardon/Work/Nerd/application/views) in "template.html.twig" at line 58.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Loader/Filesystem.php(134): Twig_Loader_Filesystem->findTemplate('.html.twig')
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(266): Twig_Loader_Filesystem->getCacheKey('.html.twig')
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(313): Twig_Environment->getTemplateClass('.html.twig', NULL)
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(374): Twig_Environment->loadTemplate('.html.twig')
	#4 /Users/frankbardon/Work/Nerd/application/storage/cache/1d/96/38cc03040008f66f4bfb6f45089d.php(95): Twig_Environment->resolveTemplate('.html.twig')
	#5 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(265): __TwigTemplate_1d9638cc03040008f66f4bfb6f45089d->doDisplay(Array, Array)
	#6 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#7 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#8 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(27): Twig_Template->render(Array)
	#9 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#10 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#11 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#12 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#13 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Loader/Filesystem.php",198] []
[2012-12-22 13:25:21] App.ERROR: Unable to find template ".html.twig" (looked into: /Users/frankbardon/Work/Nerd/application/themes/tbp/views, /Users/frankbardon/Work/Nerd/application/themes/default/views, /Users/frankbardon/Work/Nerd/application/views) in "template.html.twig" at line 58.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Loader/Filesystem.php(134): Twig_Loader_Filesystem->findTemplate('.html.twig')
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(266): Twig_Loader_Filesystem->getCacheKey('.html.twig')
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(313): Twig_Environment->getTemplateClass('.html.twig', NULL)
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(374): Twig_Environment->loadTemplate('.html.twig')
	#4 /Users/frankbardon/Work/Nerd/application/storage/cache/1d/96/38cc03040008f66f4bfb6f45089d.php(95): Twig_Environment->resolveTemplate('.html.twig')
	#5 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(265): __TwigTemplate_1d9638cc03040008f66f4bfb6f45089d->doDisplay(Array, Array)
	#6 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#7 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#8 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(27): Twig_Template->render(Array)
	#9 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#10 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#11 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#12 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#13 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Loader/Filesystem.php",198] []
[2012-12-22 13:44:10] App.ERROR: Undefined property: __TwigTemplate_1d9638cc03040008f66f4bfb6f45089d::$getTemplateName
	#0 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(26): Nerd\{closure}(8, 'Undefined prope...', '/Users/frankbar...', 26, Array)
	#1 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#2 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#3 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#4 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#5 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php",26] []
[2012-12-22 14:06:31] App.ERROR: htmlentities() expects at least 1 parameter, 0 given
	#0 [internal function]: Nerd\{closure}(2, 'htmlentities() ...', '/Users/frankbar...', 33, Array)
	#1 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(33): htmlentities()
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#3 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#5 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#6 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php",33] []
[2012-12-22 14:07:38] App.ERROR: file_put_contents(/Users/frankbardon/Work/Nerd/application/themes/tbp/views/default.html.twig): failed to open stream: Permission denied
	#0 [internal function]: Nerd\{closure}(2, 'file_put_conten...', '/Users/frankbar...', 27, Array)
	#1 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(27): file_put_contents('/Users/frankbar...', 'This is the def...')
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#3 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#4 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#5 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#6 {main}
	 ["/Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php",27] []
[2012-12-22 20:12:52] App.ERROR: Argument 1 passed to Twig_Function_Method::__construct() must implement interface Twig_ExtensionInterface, instance of CMS\Twig\Functions given, called in /Users/frankbardon/Work/Nerd/application/src/CMS/Event/SetupTemplateListener.php on line 50 and defined
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Function/Method.php(27): Nerd\{closure}(4096, 'Argument 1 pass...', '/Users/frankbar...', 27, Array)
	#1 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/SetupTemplateListener.php(50): Twig_Function_Method->__construct(Object(CMS\Twig\Functions), 'random')
	#2 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/ListenerAbstract.php(36): CMS\Event\SetupTemplateListener->run(Object(Nerd\Core\Event\Event))
	#3 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('setup', Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(70): Nerd\Core\Event\Dispatcher->dispatch('setup', Object(Nerd\Core\Event\Event))
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Function/Method.php",27] []
[2012-12-22 20:12:53] App.ERROR: Argument 1 passed to Twig_Function_Method::__construct() must implement interface Twig_ExtensionInterface, instance of CMS\Twig\Functions given, called in /Users/frankbardon/Work/Nerd/application/src/CMS/Event/SetupTemplateListener.php on line 50 and defined
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Function/Method.php(27): Nerd\{closure}(4096, 'Argument 1 pass...', '/Users/frankbar...', 27, Array)
	#1 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/SetupTemplateListener.php(50): Twig_Function_Method->__construct(Object(CMS\Twig\Functions), 'random')
	#2 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/ListenerAbstract.php(36): CMS\Event\SetupTemplateListener->run(Object(Nerd\Core\Event\Event))
	#3 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('setup', Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(70): Nerd\Core\Event\Dispatcher->dispatch('setup', Object(Nerd\Core\Event\Event))
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Function/Method.php",27] []
[2012-12-22 20:18:10] App.ERROR: A function must be an instance of Twig_FunctionInterface or Twig_SimpleFunction
	#0 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/SetupTemplateListener.php(48): Twig_Environment->addFunction('alphabet', 'twig_alphabet')
	#1 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/ListenerAbstract.php(36): CMS\Event\SetupTemplateListener->run(Object(Nerd\Core\Event\Event))
	#2 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#3 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('setup', Object(Nerd\Core\Event\Event))
	#4 /Users/frankbardon/Work/Nerd/public/development.php(70): Nerd\Core\Event\Dispatcher->dispatch('setup', Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#6 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php",888] []
[2012-12-22 20:18:10] App.ERROR: A function must be an instance of Twig_FunctionInterface or Twig_SimpleFunction
	#0 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/SetupTemplateListener.php(48): Twig_Environment->addFunction('alphabet', 'twig_alphabet')
	#1 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/ListenerAbstract.php(36): CMS\Event\SetupTemplateListener->run(Object(Nerd\Core\Event\Event))
	#2 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(69): Nerd\Core\Event\ListenerAbstract->__invoke(Object(Nerd\Core\Event\Event))
	#3 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Dispatcher.php(15): Nerd\Core\Event\Dispatcher->_dispatch('setup', Object(Nerd\Core\Event\Event))
	#4 /Users/frankbardon/Work/Nerd/public/development.php(70): Nerd\Core\Event\Dispatcher->dispatch('setup', Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#6 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php",888] []
[2012-12-22 20:36:04] App.ERROR: An exception has been thrown during the rendering of a template ("Undefined variable: kernel") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:37:24] App.ERROR: An exception has been thrown during the rendering of a template ("Undefined variable: kernel") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:37:40] App.ERROR: An exception has been thrown during the rendering of a template ("Corrupt member variable name") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:38:08] App.ERROR: An exception has been thrown during the rendering of a template ("Corrupt member variable name") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:38:09] App.ERROR: An exception has been thrown during the rendering of a template ("Corrupt member variable name") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(74): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:40:04] App.ERROR: An exception has been thrown during the rendering of a template ("Corrupt member variable name") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:40:25] App.ERROR: An exception has been thrown during the rendering of a template ("Corrupt member variable name") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:40:26] App.ERROR: An exception has been thrown during the rendering of a template ("Corrupt member variable name") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:40:29] App.ERROR: An exception has been thrown during the rendering of a template ("Corrupt member variable name") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:44:49] App.ERROR: An exception has been thrown during the rendering of a template ("Class alias [activePage] has not been registered") in "editor/edit.app.twig" at line 1.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/application/src/CMS/Controller/Editor.php(45): Twig_Template->render(Array)
	#3 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponsePathObserver.php(36): CMS\Controller\Editor->editAction(NULL)
	#4 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponsePathObserver->update(Object(Nerd\Core\Event\Event))
	#5 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#6 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#7 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 20:56:43] App.ERROR: An exception has been thrown during the rendering of a template ("Undefined variable: region") in "template.html.twig" at line 57.
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#1 /Users/frankbardon/Work/Nerd/application/storage/cache/1d/96/38cc03040008f66f4bfb6f45089d.php(95): Twig_Template->display(Array)
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(265): __TwigTemplate_1d9638cc03040008f66f4bfb6f45089d->doDisplay(Array, Array)
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#4 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#5 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponseDatabaseObserver.php(34): Twig_Template->render(Array)
	#6 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponseDatabaseObserver->update(Object(Nerd\Core\Event\Event))
	#7 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#8 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#9 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php",280] []
[2012-12-22 21:14:04] App.ERROR: An array element must be followed by a comma. Unexpected token "operator" of value "=" ("punctuation" expected with value ",") in "default.html.twig" at line 10
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(217): Twig_TokenStream->expect(9, ',', 'An array elemen...')
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(167): Twig_ExpressionParser->parseArrayExpression()
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(85): Twig_ExpressionParser->parsePrimaryExpression()
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(42): Twig_ExpressionParser->getPrimary()
	#4 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(463): Twig_ExpressionParser->parseExpression()
	#5 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(334): Twig_ExpressionParser->parseArguments(true)
	#6 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(148): Twig_ExpressionParser->getFunctionNode('cms_component', 10)
	#7 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(85): Twig_ExpressionParser->parsePrimaryExpression()
	#8 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(42): Twig_ExpressionParser->getPrimary()
	#9 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(146): Twig_ExpressionParser->parseExpression()
	#10 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(100): Twig_Parser->subparse(NULL, false)
	#11 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(480): Twig_Parser->parse(Object(Twig_TokenStream))
	#12 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(530): Twig_Environment->parse(Object(Twig_TokenStream))
	#13 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(324): Twig_Environment->compileSource('<div>??{{ cms_l...', 'default.html.tw...')
	#14 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(374): Twig_Environment->loadTemplate('default.html.tw...')
	#15 /Users/frankbardon/Work/Nerd/application/storage/cache/1d/96/38cc03040008f66f4bfb6f45089d.php(94): Twig_Environment->resolveTemplate('default.html.tw...')
	#16 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(265): __TwigTemplate_1d9638cc03040008f66f4bfb6f45089d->doDisplay(Array, Array)
	#17 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#18 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#19 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponseDatabaseObserver.php(34): Twig_Template->render(Array)
	#20 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponseDatabaseObserver->update(Object(Nerd\Core\Event\Event))
	#21 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#22 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#23 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/TokenStream.php",77] []
[2012-12-22 21:14:30] App.ERROR: A hash key must be followed by a colon (:). Unexpected token "operator" of value "=" ("punctuation" expected with value ":") in "default.html.twig" at line 10
	#0 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(268): Twig_TokenStream->expect(9, ':', 'A hash key must...')
	#1 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(169): Twig_ExpressionParser->parseHashExpression()
	#2 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(85): Twig_ExpressionParser->parsePrimaryExpression()
	#3 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(42): Twig_ExpressionParser->getPrimary()
	#4 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(463): Twig_ExpressionParser->parseExpression()
	#5 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(334): Twig_ExpressionParser->parseArguments(true)
	#6 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(148): Twig_ExpressionParser->getFunctionNode('cms_component', 10)
	#7 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(85): Twig_ExpressionParser->parsePrimaryExpression()
	#8 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/ExpressionParser.php(42): Twig_ExpressionParser->getPrimary()
	#9 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(146): Twig_ExpressionParser->parseExpression()
	#10 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Parser.php(100): Twig_Parser->subparse(NULL, false)
	#11 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(480): Twig_Parser->parse(Object(Twig_TokenStream))
	#12 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(530): Twig_Environment->parse(Object(Twig_TokenStream))
	#13 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(324): Twig_Environment->compileSource('<div>??{{ cms_l...', 'default.html.tw...')
	#14 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Environment.php(374): Twig_Environment->loadTemplate('default.html.tw...')
	#15 /Users/frankbardon/Work/Nerd/application/storage/cache/1d/96/38cc03040008f66f4bfb6f45089d.php(94): Twig_Environment->resolveTemplate('default.html.tw...')
	#16 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(265): __TwigTemplate_1d9638cc03040008f66f4bfb6f45089d->doDisplay(Array, Array)
	#17 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(239): Twig_Template->displayWithErrorHandling(Array, Array)
	#18 /Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/Template.php(250): Twig_Template->display(Array)
	#19 /Users/frankbardon/Work/Nerd/application/src/CMS/Event/ResponseDatabaseObserver.php(34): Twig_Template->render(Array)
	#20 /Users/frankbardon/Work/Nerd/vendor/nerdsrescueme/core/Nerd/Core/Event/Event.php(92): CMS\Event\ResponseDatabaseObserver->update(Object(Nerd\Core\Event\Event))
	#21 /Users/frankbardon/Work/Nerd/public/development.php(75): Nerd\Core\Event\Event->notify()
	#22 /Users/frankbardon/Work/Nerd/public/index.php(3): include('/Users/frankbar...')
	#23 {main}
	 ["/Users/frankbardon/Work/Nerd/vendor/twig/twig/lib/Twig/TokenStream.php",77] []
