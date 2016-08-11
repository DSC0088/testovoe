<?php
class Gruppa {

    const ID_NOSELECT = 0;

    //
    function getAll(){
        $all = Yii::app()->db->createCommand()
            ->select('*')
            ->from('gruppa')
            ->queryAll();

        $result = array();
        foreach($all as $k=>$v)
            $result[$v['id']] = $v['naz'];

        return $result;
    }


    // = 0 - Все OK
    // <> 0 - Код ошибки
    function create($naz) {

        if (strlen($naz)===0) return 1;

        $affected = Yii::app()->db->createCommand()->insert('gruppa', array(
            'naz'=>$naz
        ));

        return 0;
    }




    // = 0 - Все OK
    // <> 0 - Код ошибки
    function edit($id, $naz) {
        if (strlen($naz)===0) return 1;

        $affected = Yii::app()->db->createCommand()->update('gruppa', array(
            'naz'=>$naz
        ), 'id=:id', array(':id'=>$id));

        return 0;
    }


    function del($id) {

        $count = Yii::app()->db->createCommand()
            ->select('count(*) as c')
            ->from('sotrydnik_gruppa')
            ->where('gruppa_id=:id', array(':id'=>$id))
            ->queryRow();

        if (intval($count['c']) > 0) return 1;


        $affected = Yii::app()->db->createCommand()->delete('gruppa', 'id=:id', array(':id'=>$id));

        return 0;
    }


} 