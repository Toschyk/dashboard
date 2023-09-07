<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $name
 * @property string $marks
 * @property float $score
 * @property int $attendance_days
 * @property int $missed_days
 * @property float $average_mark
 * @property int $idGroup
 *
 * @property Groups $idGroup0
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'marks', 'score', 'attendance_days', 'missed_days', 'average_mark', 'idGroup'], 'required'],
            [['score', 'average_mark'], 'number'],
            [['attendance_days', 'missed_days', 'idGroup'], 'integer'],
            [['name', 'marks'], 'string', 'max' => 255],
            [['idGroup'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::class, 'targetAttribute' => ['idGroup' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'marks' => 'Marks',
            'score' => 'Score',
            'attendance_days' => 'Attendance Days',
            'missed_days' => 'Missed Days',
            'average_mark' => 'Average Mark',
            'idGroup' => 'Id Group',
        ];
    }

    /**
     * Gets query for [[IdGroup0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup0()
    {
        return $this->hasOne(Groups::class, ['id' => 'idGroup']);
    }
}
