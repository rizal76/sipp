<?php

class PelamarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','index', 'delete'),
				'expression'=>'$user->isSuperAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$pengalamans = $this->loadModelPengalaman($id);
		$this->render('view', array(
			'model'=>$this->loadModel($id), 'pengalamans'=>$pengalamans
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pelamar;
		//objek pengalaman kerja
		$pengalamans=array();
		 $i=0;
		    while($i<1) {
		        $pengalamans[$i]=PengalamanKerja::model();
		        $i++;
		    }

		if(isset($_POST['Pelamar'] , $_POST['PengalamanKerja']))
		{
			$model->attributes=$_POST['Pelamar'];
			$sss; 
          
            //nyari dimana gambar  
			if(strlen(trim(CUploadedFile::getInstance($model,'cv'))) > 0) 
            { 
                $sss=CUploadedFile::getInstance($model,'cv'); 
                $model->id= Yii::app()->user->id;
                $model->cv = $model->id.'.'.$sss->extensionName; 
                
               
            } 
			if($model->save()){
				//save gambar
				 if(strlen(trim($model->cv)) > 0)             
                    $sss->saveAs(Yii::app()->basePath .'/../cv/' . $model->cv); 

                  //nyimpan array  pengalaman kerja
		            $valid=true;
		            //nyari pengalaman kerja satu satu
				        foreach ($_POST['PengalamanKerja'] as $j=>$modelp) {
				        	//kalo pengalaman kerja oke
				            if (isset($_POST['PengalamanKerja'][$j])) {
				            	//inisialisasi
				                $pengalamans[$j]=new PengalamanKerja; // if you had static model only
				                $pengalamans[$j]->attributes=$modelp;
				                $pengalamans[$j]->id_pelamar = $model->id;
				                $valid=$pengalamans[$j]->validate() && $valid;
				            }
				        }
				        if ($valid) {
				            $i=0;
				            while (isset($pengalamans[$i])) {
				            	$pengalamans[$i++]->save(false);// models have already been validated
				            }
				           // trigger_error(" save pengalamans");
				                
				        }

				$this->redirect(array('view','id'=>$model->id));

			}
		}

		$this->render('create',array(
			'model'=>$model, 'pengalamans'=>$pengalamans,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$pengalamans = $this->loadModelPengalaman($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pelamar']))
		{
			unlink(Yii::app()->basePath .'/../cv/' . $model->cv);
			$model->attributes=$_POST['Pelamar'];
			$sss = CUploadedFile::getInstance($model,'cv');
			$model->cv= $model->id.'.'.$sss->extensionName;
			
			if($model->save()){
				$sss->saveAs(Yii::app()->basePath.'/../cv/' . $model->cv);
					//nyimpan array  pengalaman kerja
		            $valid=true;
		            //nyari pengalaman kerja satu satu
				    foreach ($_POST['PengalamanKerja'] as $j=>$modelp) {
				        	//kalo pengalaman kerja oke
				            if (isset($_POST['PengalamanKerja'][$j])) {
				            	//inisialisasi
				                //$pengalamans[$j]=new PengalamanKerja; // if you had static model only
				                $pengalamans[$j]->attributes=$modelp;
				                $pengalamans[$j]->id_pelamar = $model->id;
				                $valid=$pengalamans[$j]->validate() && $valid;
				            }
				    }
				    if ($valid) {
				            $i=0;
				            while (isset($pengalamans[$i])) {
				            	$pengalamans[$i++]->save(false);// models have already been validated
				            }
				           // trigger_error(" save pengalamans");
				                
				    }
				$this->redirect(array('view','id'=>$model->id));
		
			}
		}

		$this->render('update',array(
			'model'=>$model, 'pengalamans'=>$pengalamans,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		unlink(Yii::app()->basePath .'/../cv/' . $model->cv);
			
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pelamar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$records=Pelamar::model()->findAll();
	    $this->render('admin',array(
	        'model'=>$records,
	    ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pelamar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pelamar::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelPengalaman($id)
	{
		$model=PengalamanKerja::model()->findAllByAttributes(array('id_pelamar'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested Pengalaman does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pelamar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pelamar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
