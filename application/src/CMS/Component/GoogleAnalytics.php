<?php

namespace CMS\Component;

class GoogleAnalytics extends ComponentAbstract
{
	protected $name = 'google-analytics';

	public function getName()
	{
		return $this->name;
	}

	public function render()
	{
		$ua = $this->getOption('ua');

		return <<<GA
<script type="text/javascript" charset="utf-8">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '$ua']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
GA;
	}
}