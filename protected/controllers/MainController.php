<?php

class MainController extends Controller {

    public $layout='//layouts/lay1';

    public function actionError(){
        echo 'err';
    }

    public function actionIndex(){
        $s = new Sotrydnik();
        $g = new Gruppa();
        $n = new Navyk();

        //CVarDumper::dump($g->getAll(),10, true);

        $gruppa_list = $g->getAll();
        $gruppa_sel = isset($_GET['gruppa_dropdown']) ? $_GET['gruppa_dropdown']: Gruppa::ID_NOSELECT;

        $navyk_list = $n->getAll();
        $navyk_sel = isset($_GET['navyk_dropdown']) ? $_GET['navyk_dropdown']: Navyk::ID_NOSELECT;

        $nameste_list = Sotrydnik::$nameste_list;
        $nameste_sel = isset($_GET['nameste_dropdown']) ? $_GET['nameste_dropdown']: Sotrydnik::NAMESTE_NOSELECT;


        $sotrydnik = $s->getAll($gruppa_sel, $navyk_sel, $nameste_sel);


        //CVarDumper::dump($sotrydnik,10, true);

        $this->render('index', array(
            'gruppa_list' => $gruppa_list,
            'gruppa_sel' => $gruppa_sel,
            'navyk_list' => $navyk_list,
            'navyk_sel' => $navyk_sel,
            'nameste_list' => $nameste_list,
            'nameste_sel' => $nameste_sel,
            'sotrydnik' => $sotrydnik,
        ));


    }


    public function actionCreate() {


        // Читаем
        $familia = isset($_POST['familia']) ? $_POST['familia']: '';
        $navyki = isset($_POST['navyki']) && is_array($_POST['navyki']) ? $_POST['navyki']: array();
        $gruppy = isset($_POST['gruppy']) && is_array($_POST['gruppy']) ? $_POST['gruppy']: array();
        $nameste = isset($_POST['nameste']) ? intval($_POST['nameste']): 1;


        $s = new Sotrydnik();
        $err = $s->create($familia,$navyki,$gruppy,$nameste);


        $result = array('err' => $err);
        if ($err==0) $result['msg'] = 'Добавлено';
        elseif ($err==1) $result['msg'] = 'Введена пустая фамилия';
        elseif ($err==2) $result['msg'] = 'Выберите группы и навыки';

        echo json_encode($result);
    }


    public function actionDel(){
        $id = isset($_POST['id']) ? $_POST['id']: 0;

        $s = new Sotrydnik();
        $err = $s->del($id);


        $result = array('err' => $err);

        if ($err==0) $result['msg'] = 'Удалено';
        elseif ($err==1) $result['msg'] = 'Нельзя удалить id<6';

        echo json_encode($result);
    }


    public function actionEdit(){


        // Читаем
        $id = isset($_POST['id']) ? intval($_POST['id']): 0;
        $familia = isset($_POST['familia']) ? $_POST['familia']: '';
        $navyki = isset($_POST['navyki']) && is_array($_POST['navyki']) ? $_POST['navyki']: array();
        $gruppy = isset($_POST['gruppy']) && is_array($_POST['gruppy']) ? $_POST['gruppy']: array();
        $nameste = isset($_POST['nameste']) ? intval($_POST['nameste']): 1;

        $s = new Sotrydnik();
        $err = $s->edit($id, $familia,$navyki,$gruppy,$nameste);

        $result = array('err' => $err);
        if ($err==0) $result['msg'] = 'Сохранено';
        elseif ($err==1) $result['msg'] = 'Введена пустая фамилия';
        elseif ($err==2) $result['msg'] = 'Выберите группы и навыки';
        elseif ($err==3) $result['msg'] = 'Нельзя редактировать id<6';

        echo json_encode($result);

    }


}