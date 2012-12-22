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
