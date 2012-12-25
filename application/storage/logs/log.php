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
