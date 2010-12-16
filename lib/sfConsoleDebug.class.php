<?php

class sfConsoleDebug extends sfWebDebug
{
	/**
	 * Configures the web debug toolbar.
	 */
	public function configure()
	{
		$this->setPanel('cache', new sfConsoleDebugPanelCache($this));
		$this->setPanel('config', new sfConsoleDebugPanelConfig($this));
		$this->setPanel('logs', new sfConsoleDebugPanelLogs($this));
		$this->setPanel('memory', new sfConsoleDebugPanelMemory($this));
		$this->setPanel('database', new sfConsoleDebugPanelDatabase($this));
		$this->setPanel('timer', new sfConsoleDebugPanelTimer($this));
		$this->setPanel('info', new sfConsoleDebugPanelInfo($this));
	}

	public function injectToolbar($content)
	{
		$debug = $this->toJSON();
		return str_ireplace('</body>', "<script type=\"text/javascript\"> //<![CDATA[ \n console.log($debug); \n //]]></script></body>", $content);;
	}

	public function toJSON()
	{
		$panels = array();
		foreach ($this->panels as $name => $panel) if ($title = $panel->getTitle()) {
			$panels[$title] = array('title' => $panel->getPanelTitle(), 'content' => $panel->getPanelContent());
		}
		return json_encode($panels);
	}
}
