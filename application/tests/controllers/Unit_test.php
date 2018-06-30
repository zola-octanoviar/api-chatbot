<?php
/**
 * Chatbot Unit Test
 * @author     Zola
 */
class Unit_test extends TestCase
{
	protected $strictRequestErrorCheck = false;

	public function test_rate_get()
	{
		try {
			$output = $this->request('GET', 'product/rate');
		} catch (CIPHPUnitTestExitException $e) {
			$output = ob_get_clean();
		}
		$this->assertEquals(
			'[{"id":1,"name":"motor bekas","rate":"5%"},{"id":2,"name":"motor baru","rate":"6%"},{"id":3,"name":"mobil bekas","rate":"7%"},{"id":4,"name":"mobil baru","rate":"8%"},{"id":5,"name":"smartphone","rate":"2%"},{"id":6,"name":"laptop","rate":"2.5%"},{"id":7,"name":"multiguna","rate":"2.5%"}]',
			$output
		);
		$this->assertResponseCode(200);
		fwrite(STDOUT, __METHOD__ . "\n");
	}
	
	public function test_rate_get_name()
	{
		try {
			$output = $this->request('GET', 'product/rate/name/motor');
		} catch (CIPHPUnitTestExitException $e) {
			$output = ob_get_clean();
		}

		$this->assertEquals(
			'{"id":2,"name":"motor baru","rate":"6%"}',
			$output
		);
		$this->assertResponseCode(200);
		fwrite(STDOUT, __METHOD__ . "\n");
	}


	public function test_rate_get_name_failed()
	{
		try {
			$output = $this->request('GET', 'product/rate/name/samsung');
		} catch (CIPHPUnitTestExitException $e) {
			$output = ob_get_clean();
		}

		$this->assertEquals(
			'{"status":false,"message":"Products could not be found for samsung"}',
			$output
		);

		$this->assertResponseCode(404);
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	public function test_home_index()
	{
		$output = $this->request('GET', '/');
		$this->assertContains('<title>UnAuthorized ACCESS</title>', $output);
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	public function test_method_404()
	{
		$this->request('GET', 'welcome/method_not_exist');
		$this->assertResponseCode(404);
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	public function test_method_200()
	{
		$this->request('GET', 'product/test');
		// result : passed
		$this->assertResponseCode(200);

		// result : failed
		//$this->assertResponseCode(404);

		fwrite(STDOUT, __METHOD__ . "\n");
	}

	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
		fwrite(STDOUT, __METHOD__ . "\n");
	}
}
