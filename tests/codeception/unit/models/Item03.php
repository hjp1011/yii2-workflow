<?php

namespace tests\codeception\unit\models;

use Yii;
use hjp1011\workflow\base\SimpleWorkflowBehavior;
use hjp1011\workflow\source\file\IWorkflowDefinitionProvider;

/**
 * @property integer $id
 * @property string $name
 * @property string $status
 */
class Item03 extends \yii\db\ActiveRecord implements IWorkflowDefinitionProvider
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    public function behaviors()
    {
        return [
        	'workflow' => [
        		'class' => SimpleWorkflowBehavior::className()
    	    ]
        ];
    }
	public function getDefinition()
	{
		return [
			'initialStatusId' => 'A',
			'status' => [
				'A' => [
					'label' => 'Entry',
					'transition' => ['B','A']
				],
				'B' => [
					'label' => 'Published',
					'transition' => ['A','C']
				],
				'C' => [
					'label' => 'node C',
					'transition' => ['A','D']
				]
			]
		];
	}

}
