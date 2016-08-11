<?php
class NavykController extends Controller{

    public function actionIndex(){
        $n = new Navyk();
        $navyk = $n->getAll();

        $this->render('index', array(
            'navyk' => $navyk,
        ));
    }

    public function actionCreate(){
        $naz = isset($_POST['naz']) ? $_POST['naz']: '';
        $n = new Navyk();
        $err = $n->create($naz);

        $result = array('err' => $err);

        if ($err==0) $result['msg'] = 'Добавлено';
        elseif ($err==1) $result['msg'] = 'Введена пустая строка';

        echo json_encode($result);
    }


    public function actionEdit(){
        $id = isset($_POST['id']) ? $_POST['id']: 0;
        $naz = isset($_POST['naz']) ? $_POST['naz']: '';

        $n = new Navyk();
        $err = $n->edit($id, $naz);

        $result = array('err' => $err);

        if ($err==0) $result['msg'] = 'Сохранено';
        elseif ($err==1) $result['msg'] = 'Введена пустая строка';

        echo json_encode($result);
    }


    public function actionDel(){
        $id = isset($_POST['id']) ? $_POST['id']: 0;

        $n = new Navyk();
        $err = $n->del($id);


        $result = array('err' => $err);

        if ($err==0) $result['msg'] = 'Удалено';
        elseif ($err==1) $result['msg'] = 'Нельзя удалить, некоторые сотрудники используют';

        echo json_encode($result);
    }






} 