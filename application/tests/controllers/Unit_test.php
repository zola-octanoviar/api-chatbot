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
		/*
		try {
			$output = $this->request('GET', 'product/rate');
		} catch (CIPHPUnitTestExitException $e) {
			$output = ob_get_clean();
		}
		*/
		$output = $this->request('GET', 'product/rate');
		$this->assertEquals(
			'[{"id":1,"name":"motor bekas","rate":"5%"},{"id":2,"name":"motor baru","rate":"6%"},{"id":3,"name":"mobil bekas","rate":"7%"},{"id":4,"name":"mobil baru","rate":"8%"},{"id":5,"name":"smartphone","rate":"2%"},{"id":6,"name":"laptop","rate":"2.5%"},{"id":7,"name":"multiguna","rate":"2.5%"}]',
			$output
		);
		$this->assertResponseCode(200);
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	public function test_rate_get_name()
	{
		$output = $this->request('GET', 'product/rate/name/motor');
		$this->assertEquals(
			'{"id":2,"name":"motor baru","rate":"6%"}',
			$output
		);
		$this->assertResponseCode(200);
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	public function test_rate_get_name_failed()
	{
		$output = $this->request('GET', 'product/rate/name/samsung');
		$this->assertEquals(
			'{"status":false,"message":"Products could not be found for samsung"}',
			$output
		);
		$this->assertResponseCode(404);
		fwrite(STDOUT, __METHOD__ . "\n");
	}
	
}
