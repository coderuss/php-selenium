<?php
/**
 * Created by PhpStorm.
 * User: Findwayinsea
 * Date: 2016/9/3
 * Time: 14:57
 */

require __DIR__.'/vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver; 
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverKeys;
use Facebook\WebDriver\WebDriverExpectedCondition;


class Facebook extends PHPUnit_Framework_TestCase {

    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;
    protected $url = 'https://github.com';

    public function setUp()
    {
        $host = 'http://localhost:4444/wd/hub';
        //$host = 'http://localhost:4444/wd/hub';
        $desired_capabilities = DesiredCapabilities::chrome();
        $desired_capabilities->setCapability('acceptSslCerts', false);
        $this->webDriver = RemoteWebDriver::create($host, $desired_capabilities);
    }

    public function testGitHubHome()
    {
        $this->webDriver->get($this->url);
        // checking that page title contains word 'GitHub'
        $this->assertContains('GitHub', $this->webDriver->getTitle());
    }
}
?>
