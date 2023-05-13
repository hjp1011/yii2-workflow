<?php


namespace tests\unit\workflow\source\file;

use Yii;
use yii\codeception\TestCase;
use tests\codeception\unit\models\Item04;
use yii\base\InvalidConfigException;
use yii\base\Exception;
use hjp1011\workflow\source\file\WorkflowFileSource;
use hjp1011\workflow\base\Status;
use hjp1011\workflow\base\Transition;
use hjp1011\workflow\base\Workflow;
use hjp1011\workflow\source\file\GraphmlLoader;


class GraphmlLoaderTest extends TestCase
{
	use \Codeception\Specify;

	public function testParseFail1()
	{
		$this->specify('convertion fails when no custom property "initialStatusId" is defined',function (){

			$this->expectException(
				'hjp1011\workflow\base\WorkflowException'
			);
			$this->expectExceptionMessage(
				"Missing custom workflow property : 'initialStatusId'"
			);

			$l = new GraphmlLoader();
			$filename = Yii::getAlias('@tests/codeception/unit/models/workflow-01.graphml');
			$l->convert($filename);
		});
	}

	public function testParseFail2()
	{
		$this->specify('convertion fails when no node is defined',function (){

			$this->expectException(
				'hjp1011\workflow\base\WorkflowException'
			);
			$this->expectExceptionMessage(
				"no node could be found in this workflow"
			);

			$l = new GraphmlLoader();
			$filename = Yii::getAlias('@tests/codeception/unit/models/workflow-00.graphml');
			$l->convert($filename);
		});
	}

	public function testParseFail3()
	{
		$this->specify('convertion fails when no edge is defined',function (){

			$this->expectException(
				'hjp1011\workflow\base\WorkflowException'
			);
			$this->expectExceptionMessage(
				"no edge could be found in this workflow"
			);

			$l = new GraphmlLoader();
			$filename = Yii::getAlias('@tests/codeception/unit/models/workflow-03.graphml');
			$l->convert($filename);
		});
	}

	public function testParseFail4()
	{
		$this->specify('convertion fails when more then one workflow (graph) is defined',function (){

			$this->expectException(
				'hjp1011\workflow\base\WorkflowException'
			);
			$this->expectExceptionMessage(
				"more than one workflow found"
			);

			$l = new GraphmlLoader();
			$filename = Yii::getAlias('@tests/codeception/unit/models/workflow-04.graphml');
			$l->convert($filename);
		});
	}
}
