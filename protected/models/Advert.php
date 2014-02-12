<?php

/**
 * This is the model class for table "advert".
 *
 * The followings are the available columns in table 'advert':
 * @property integer $id
 * @property integer $user_id
 * @property string $create_date
 * @property string $title
 * @property string $text
 * @property string $image_url
 * @property integer $category_id
 * @property integer $pub_status
 * @property integer $deleted
 *
 * The followings are the available model relations:
 * @property Category $category
 */
class Advert extends CActiveRecord
{
    public $categoryId;
    public $autoId;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'advert';
	}

	public function rules()
	{
		return array(
			array('user_id, pub_status, deleted', 'numerical', 'integerOnly'=>true),
			array('title, image_url', 'length', 'max'=>255),
			array('title', 'required', 'message'=>'Пожалуйста заполните заголовок'),
			array('text', 'required', 'message'=>'Пожалуйста заполните текст'),
			array('category_id', 'required', 'message'=>'Пожалуйста выберите категорию'),
			array('create_date, text, category_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, create_date, title, text, image_url, category_id, pub_status, deleted', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'create_date' => 'Date',
			'title' => 'Title',
			'text' => 'Text',
			'image_url' => 'Image Url',
			'category_id' => 'Category',
			'pub_status' => 'Status',
			'deleted' => 'Deleted',
			'confirmed' => 'Confirmed',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('id',$this->id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('pub_status',$this->pub_status);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function searchInNew()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('id',$this->id);
        $criteria->compare('create_date',$this->create_date,true);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('text',$this->text,true);
        $criteria->compare('category_id',$this->category_id);
        $criteria->compare('pub_status',$this->pub_status);

        $criteria->addSearchCondition('deleted','0');
        $criteria->addSearchCondition('pub_status','1');

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function loadAdvertsFromCategories($id)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'deleted = 0';
        $criteria->addCondition("category_id = '$id' AND pub_status = '0' ");
        $criteria->addCondition("pub_status = '0'");
        $data = Advert::model()->findAll($criteria);
        return $data;
    }

    public function loadAdverts($id){
        $data = Advert::model()->findByAttributes(array('category_id'=>$id));
        return $data;
    }

    public function getNewAdverts(){
        $criteria = new CDbCriteria();
        $criteria->condition = 'pub_status = 1';
        $criteria->addCondition ('deleted = 0');

        $dataProvider = new CActiveDataProvider('Advert', array(
            'criteria'=>$criteria
        ));
        return $dataProvider;
    }

    public function getCountNewAdverts(){
        $criteria = new CDbCriteria();
        $criteria->condition = 'pub_status = 1';
        $criteria->addCondition ('deleted = 0');

        $count = Advert::model()->count($criteria);
        return $count;
    }

    public function userAdverts()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = "user_id = " .Yii::app()->user->user_id ;
        $criteria->addCondition('deleted = 0');
        $sort = new CSort();
        $sort->attributes = array(
            'articleCount'=>array(
                'asc'=>'articleCountASC',
                'desc'=>'articleCountDESC',
            ),
            '*',
        );
        $dataProvider = new CActiveDataProvider(self::model(),[
            'criteria'=>$criteria,

            'sort' =>[
                'attributes'=>array(
                    'pub_status'=>array(
                        'asc'=>'pub_status DESC',
                        'desc'=>'pub_status ASC',
                    ),
                    '*'
                ),
                'defaultOrder' => ['create_date'=> true, 'pub_status ASC'],
            ]
        ]
        );

        return $dataProvider;
    }

    public function publish(){
        $this->pub_status = 0;
        $this->save();
        return true;
    }

    public function loadAdvert($id){
        return Advert::model()->findByPk($id);
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Advert the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
