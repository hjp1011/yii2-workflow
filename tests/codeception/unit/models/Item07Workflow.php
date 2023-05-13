<?php

namespace tests\codeception\unit\models;

use hjp1011\workflow\source\file\IWorkflowDefinitionProvider;

class Item07Workflow implements IWorkflowDefinitionProvider
{
	public function getDefinition()
	{
		return [
			'initialStatusId' => 'A',
			'status' => [
				'A' => [
					'label' => 'Entry',
					'transition' => [
						'B' => [],
						'A' => []
					]
				],
				'B' => [
					'label' => 'Published',
					'transition' => [
						'A' => [],
						'C' => []
					]
				],
				'C' => [
					'label' => 'node C',
					'transition' => [
						'A' => [],
						'D' => []
					]
				],
				'D' => [
					'label' => 'node D',
					'transition' => []
				]
			]
		];
	}
}