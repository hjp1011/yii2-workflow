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


class ClassMapTest extends TestCase
{
	use \Codeception\Specify;

	public function testConstructFails1()
	{
		$this->specify('Workflow source construct fails if classMap is not an array',function (){

			$this->expectException(
				'yii\base\InvalidConfigException'
			);
			$this->expectExceptionMessage(
				'Invalid property type : \'classMap\' must be a non-empty array'
			);

			new WorkflowFileSource([
				'classMap' => null
			]);
		});
	}

	public function testConstructFails2()
	{
		$this->specify('Workflow source construct fails if classMap is an empty array',function (){

			$this->expectException(
				'yii\base\InvalidConfigException'
			);
			$this->expectExceptionMessage(
				'Invalid property type : \'classMap\' must be a non-empty array'
			);

			new WorkflowFileSource([
				'classMap' => null
			]);
		});
	}
	public function testConstructFails3()
	{
		$this->specify('Workflow source construct fails if a class entry is missing',function (){

			$this->expectException(
				'yii\base\InvalidConfigException'
			);
			$this->expectExceptionMessage(
				'Invalid class map value : missing class for type workflow'
			);

			new WorkflowFileSource([
				'classMap' =>  [
					'workflow'   => null,
					'status'     => 'hjp1011\workflow\base\Status',
					'transition' => 'hjp1011\workflow\base\Transition'
				]
			]);


		});
	}

	public function testClassMapStatus()
	{
		$this->specify('Replace default status class with custom one',function (){
			$src = new WorkflowFileSource([
				'definitionLoader' => [
					'class' => 'hjp1011\workflow\source\file\PhpClassLoader',
					'namespace' => 'tests\codeception\unit\models'
				],
				'classMap' =>  [
					WorkflowFileSource::TYPE_STATUS     => 'tests\codeception\unit\models\MyStatus',
				]
			]);

			verify($src->getClassMapByType(WorkflowFileSource::TYPE_WORKFLOW))->equals(	'hjp1011\workflow\base\Workflow'  );
			verify($src->getClassMapByType(WorkflowFileSource::TYPE_STATUS))->equals(	'tests\codeception\unit\models\MyStatus'  );
			verify($src->getClassMapByType(WorkflowFileSource::TYPE_TRANSITION))->equals('hjp1011\workflow\base\Transition');

			$status = $src->getStatus('Item04Workflow/A');

			expect(get_class($status))->equals('tests\codeception\unit\models\MyStatus');
		});
	}
}
