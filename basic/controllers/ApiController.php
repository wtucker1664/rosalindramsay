<?php
namespace app\controllers;
use Yii;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\rest\Controller;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use app\models\Books;
use app\models\Authors;
use app\models\User;
use app\models\Clients;
/**
 * Api controller
 */
class ApiController extends Controller
{
    /**
     * @inheritdoc
     */
	public function init()
	{
		parent::init();
		\Yii::$app->user->enableSession = false;
	}
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
        		'except' => ['login'],
        'authMethods' => [
            HttpBearerAuth::className(),

        ]
        			
        ];
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'only' => ['hotlist','reports','admin','books','book','author','hothotlist','restpassword'],
            'rules' => [
                [
                    'actions' => ['hotlist','reports','admin','books','book','author','hothotlist','restpassword'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];
        return $behaviors;
    }
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            return ['access_token' => Yii::$app->user->identity->getAuthKey()];
        } else {
            $model->validate();
            return $model;
        }
    }
    public function actionHotlist()
    {
    	$data = Yii::$app->getRequest()->getQueryParams();
    	 
    	
    	 
    	
    	 
    	if(isset($data["q"])){
    		$booksCount = Books::find()->joinWith('author')->where("hot_hot=1")->andFilterWhere(["like","Books.Title",$data['q']])->orFilterWhere(["like","Authors.name",$data['q']])->count("*");
    		$numPages = ceil($booksCount / 10);
    		$offset = ($data['page'] - 1) * 10 + 1;
    		
    		if($offset == 1){
    			$offset=0;
    		}
    		$hotHotMod = Books::find()->joinWith('author')->where("hot_hot=1")->andFilterWhere(["like","Books.Title",$data['q']])->orFilterWhere(["like","Authors.name",$data['q']])->limit(10)->offset($offset)->orderBy(["zl_created"=>"DESC"])->all();
    	}else{
    		$booksCount = Books::find()->joinWith('author')->where("hot_hot=1")->count("*");
    		$numPages = ceil($booksCount / 10);
    		$offset = ($data['page'] - 1) * 10 + 1;
    		
    		if($offset == 1){
    			$offset=0;
    		}
    		$hotHotMod = Books::find()->joinWith('author')->where("hot_hot=1")->limit(10)->offset($offset)->orderBy(["zl_created"=>"DESC"])->all();
    		 
    	}
    	
    	$hotHotList = [];
    	$i=0;
    	foreach ($hotHotMod as $hotList){
    		 
    		$hotHotList[$i]['Title'] = strtoupper($hotList->Title);
    		$hotHotList[$i]['Author'] = $hotList->author->name;
    		$hotHotList[$i]['authorID'] = $hotList->a_AuthorID;
    		$hotHotList[$i]['bookID'] = $hotList->a__bookID;
    		$i++;
    	}
    	
    
//             'username' => Yii::$app->user->identity->username,
//             'access_token' => Yii::$app->user->identity->getAuthKey(),
			
    
        $response = [
    //			'username' => Yii::$app->user->identity->username,
    	//		'access_token' => Yii::$app->user->identity->getAuthKey(),
    			'numPages'=>$numPages,
    			"hotList"=>$hotHotList
    	];
     	return $response;
    }
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                $response = [
                    'flash' => [
                        'class' => 'success',
                        'message' => 'Thank you for contacting us. We will respond to you as soon as possible.',
                    ]
                ];
            } else {
                $response = [
                    'flash' => [
                        'class' => 'error',
                        'message' => 'There was an error sending email.',
                    ]
                ];
            }
            return $response;
        } else {
            $model->validate();
            return $model;
        }
    }
    
    public function actionBooks(){
    	$data = Yii::$app->getRequest()->getQueryParams();
   
    	
    	
    	if(isset($data["q"])){
    		$booksCount = Books::find()->joinWith('author')->andFilterWhere(["like","Books.Title",$data['q']])->orFilterWhere(["like","Authors.name",$data['q']])->count("*");
    		 
    		$numPages = ceil($booksCount / 10);
    		$offset = ($data['page'] - 1) * 10 + 1;
    		
    		if($offset == 1){
    			$offset=0;
    		}
    		$booksMod = Books::find()->andFilterWhere(["like","Books.Title",$data['q']])->orFilterWhere(["like","Authors.name",$data['q']])->joinWith('author')->limit(10)->offset($offset)->orderBy(["zl_created"=>"DESC"])->all();
    		
    	}else{
    		$booksCount = Books::find()->joinWith('author')->count("*");
    		 
    		$numPages = ceil($booksCount / 10);
    		$offset = ($data['page'] - 1) * 10 + 1;
    		
    		if($offset == 1){
    			$offset=0;
    		}
    		$booksMod = Books::find()->joinWith('author')->limit(10)->offset($offset)->orderBy(["zl_created"=>"DESC"])->all();
    		
    	}
    	
    	
    	
    	
    	$i=0;
    	$books = array();
    	foreach($booksMod as $book){
    		$books[$i]['Title'] = strtoupper($book->Title);
    		$books[$i]['Author'] = $book->author->name;
    		$books[$i]['authorID'] = $book->a_AuthorID;
    		$books[$i]['bookID'] = $book->a__bookID;
    		$i++;
    	}
    	$hotHotMod = Books::find()->joinWith('author')->where("hot_hot=1")->limit(10)->orderBy(["zl_created"=>"DESC"])->all();
    	$hotHotList = [];
    	$i=0;
    	foreach ($hotHotMod as $hotList){
    	
    		$hotHotList[$i]['Title'] = strtoupper($hotList->Title);
    		$hotHotList[$i]['Author'] = $hotList->author->name;
    		$hotHotList[$i]['authorID'] = $hotList->a_AuthorID;
    		$hotHotList[$i]['bookID'] = $hotList->a__bookID;
    		$i++;
    	}
    	
    	$response = [
    //			'username' => Yii::$app->user->identity->username,
    	//		'access_token' => Yii::$app->user->identity->getAuthKey(),
    			'numPages'=>$numPages,
    			'books'=>$books,
    			"hotHotList"=>$hotHotList
    	];
     	return $response;
    	
    	
    }
    
    
    
    public function actionBook(){
    	$data = Yii::$app->getRequest()->getBodyParams();
    	
    	$booksMod = Books::find()->joinWith('author')
    	->where(["a__bookID" => $data['bookID']])
    	->one();
    	
    	$hotHotMod = Books::find()->joinWith('author')->where("hot_hot=1")->limit(10)->orderBy(["zl_created"=>"DESC"])->all();
    	$hotHotList = [];
    	$i=0;
    	foreach ($hotHotMod as $hotList){
    		 
    		$hotHotList[$i]['Title'] = strtoupper($hotList->Title);
    		$hotHotList[$i]['Author'] = $hotList->author->name;
    		$hotHotList[$i]['authorID'] = $hotList->a_AuthorID;
    		$hotHotList[$i]['bookID'] = $hotList->a__bookID;
    		$i++;
    	}

		$author = array();
    	$book = array();

    		$book['Title'] = strtoupper($booksMod->Title);
    		$book['ID'] = $booksMod->a__bookID;
    		$book['Publication_Date'] = $booksMod->Publication_Date;
    		if(isset($booksMod->originatingPublisher)){
    			$book['Publisher'] = $booksMod->originatingPublisher->name;
    		}else{
    			$book['Publisher'] = "No Publisher Name";
    		}
    		if(isset($booksMod->primaryAgent)){
    			$book['PrimaryAgent'] = $booksMod->primaryAgent->name;
    		}else{
    			$book['PrimaryAgent'] = "No Primary Agent";
    		}
    		if(isset($booksMod->translationAgent)){
    			$book['TranslationAgent'] = $booksMod->translationAgent->name;
    		}else{
    			$book['TranslationAgent'] = "No Translation Agent";
    		}
//     		$book[''] = $booksMod->
//     		$book[''] = $booksMod->
//     		$book[''] = $booksMod->
//     		$book[''] = $booksMod->
//     		$book[''] = $booksMod->
    	//	$book[''] = $booksMod->
    		
    		
    	$author['name'] = $booksMod->author->name;
    	$author['weblink'] = $booksMod->author->weblink;
    	$author['img'] = "";

    	$response = [
    			//			'username' => Yii::$app->user->identity->username,
    			//		'access_token' => Yii::$app->user->identity->getAuthKey(),
    			'details'=>['book'=>$book,'author'=>$author],
    			'hotHotList'=>$hotHotList
    	];
    	return $response;
    	
    }
    
    public function actionAuthor(){
    	$data = Yii::$app->getRequest()->getBodyParams();

    	$authorMod = Authors::find()->joinWith('books')
    	->where(["a__authorID_t" => $data['authorID']])
    	->one();
    	
    	$author = array();
    	$books = array();
		for($i=0;$i<sizeof($authorMod->books);$i++){
    		$books[$i]['Title'] = strtoupper($authorMod->books[$i]->Title);
    		$books[$i]['bookID'] = $authorMod->books[$i]->a__bookID;
		}
		
		$author['name'] = $authorMod->name;
		$author['weblink'] = $authorMod->weblink;
		$author['img'] = "";
		
		$response = [
				//			'username' => Yii::$app->user->identity->username,
				//		'access_token' => Yii::$app->user->identity->getAuthKey(),
				'details'=>['books'=>$books,'author'=>$author],
				//'hotHotList'=>$hotHotList
		];
		return $response;
		
    }
    
    public function actionHothotlist(){
    	$hotHotMod = Books::find()->joinWith('author')->where("hot_hot=1")->limit(10)->orderBy(["zl_created"=>"DESC"])->all();
    	$hotHotList = [];
    	$i=0;
    	foreach ($hotHotMod as $hotList){
    		 
    		$hotHotList[$i]['Title'] = strtoupper($hotList->Title);
    		$hotHotList[$i]['Author'] = $hotList->author->name;
    		$hotHotList[$i]['authorID'] = $hotList->a_AuthorID;
    		$hotHotList[$i]['bookID'] = $hotList->a__bookID;
    		$i++;
    	}
    	$response = [
    			//			'username' => Yii::$app->user->identity->username,
    			//		'access_token' => Yii::$app->user->identity->getAuthKey(),
    			'hotHotList'=>$hotHotList
    	];
    	return $response;
    }
    
    public function actionAdmin(){
    	//print ;
    	$userMod = Clients::find()->where(['access_token'=>Yii::$app->user->identity->getAuthKey()])->one();
    	
    	$user['name'] = $userMod->name;
    	$user['address1'] = $userMod->address1Street;
    	$user['address2'] = $userMod->address1Country;
    	$user['address3'] = "";
    	$user['city'] = $userMod->address1City;
    	$user['postcode'] = $userMod->address1PostalCode;
    	$user['company'] = "";
    	$user['username'] = $userMod->username;
    	
    	return $user;
    }
    
	public function actionRestpassword(){
		$data = Yii::$app->getRequest()->getBodyParams();
		$userMod = Clients::find()->where(['access_token'=>Yii::$app->user->identity->getAuthKey()])->one();
		
		$userMod->password = $data['pass'];
		$userMod->save();
		return ["success" => true];
		
	}
}