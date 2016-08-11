<?php
class Sotrydnik {







    const NAMESTE_NOSELECT = '-';
    public static $nameste_list = array(
        'n' => 'Нет',
        'y' => 'Да'
    );





    // Возвращ. массив всех сотрудников
    public function getAll($gruppa_sel, $navyk_sel, $nameste_sel){

        // Фильтры
        $filter_full = '';
        $filter_elements = array();
        $filter_params = array();
        if (intval($gruppa_sel) > 0) {
            $filter_elements[] = 'FIND_IN_SET(:gruppa_set, gruppa_set)';
            $filter_params[] = array(":gruppa_set",$gruppa_sel, PDO::PARAM_STR);
        }
        if (intval($navyk_sel) > 0) {
            $filter_elements[] = 'FIND_IN_SET(:navyk_set, navyk_set)';
            $filter_params[] = array(":navyk_set",$navyk_sel, PDO::PARAM_STR);
        }
        if (array_key_exists($nameste_sel, self::$nameste_list)) {
            $filter_elements[] = 'nameste=:nameste';
            $filter_params[] = array(":nameste",$nameste_sel, PDO::PARAM_STR);
        }
        if (count($filter_elements) > 0)
            $filter_full = 'WHERE '.implode(' AND ', $filter_elements);


        // Запрос
        $sql = 'SELECT * FROM (
                    SELECT s.*,  GROUP_CONCAT(sg.gruppa_id) AS gruppa_set,
                                      GROUP_CONCAT(sn.navyk_id) AS navyk_set
                    FROM sotrydnik s
                    INNER JOIN sotrydnik_gruppa sg ON(s.id = sg.sotrydnik_id)
                    INNER JOIN sotrydnik_navyk sn ON(s.id = sn.sotrydnik_id)
                    GROUP BY s.id
                ) as vnut '.$filter_full;

        $command=Yii::app()->db->createCommand($sql);

        foreach($filter_params as $k=>$v)
            $command->bindParam($v[0], $v[1], $v[2]);

        //
        $result = $command->queryAll();
        foreach ($result as $k=>&$v) {
            $v['navyk_arr'] = array_values(array_unique(explode(',', $v['navyk_set'])));
            $v['gruppa_arr'] = array_values(array_unique(explode(',', $v['gruppa_set'])));
        }

        return $result;
    }




    // 0 - все OK
    // <> 0 - код ошибки
    public function create($familia,$navyki,$gruppy,$nameste){
        if (strlen($familia) ===0) return 1;
        if (count($navyki)==0 || count($gruppy)==0) return 2;

        $affected = Yii::app()->db->createCommand()->insert('sotrydnik', array(
            'familia'=>$familia,
            'nameste'=> $nameste ? 'y': 'n',
        ));

        $id = Yii::app()->db->getLastInsertId();

        foreach($navyki as $navyk_id)
            Yii::app()->db->createCommand()->insert('sotrydnik_navyk', array(
                'sotrydnik_id'=>$id,
                'navyk_id'=> $navyk_id,
            ));

        foreach($gruppy as $gruppa_id)
            Yii::app()->db->createCommand()->insert('sotrydnik_gruppa', array(
                'sotrydnik_id'=>$id,
                'gruppa_id'=> $gruppa_id,
            ));

        return 0;
    }




    public function del($id) {
        if ($id<=6) return 1;

        Yii::app()->db->createCommand()->delete('sotrydnik', 'id=:id', array(':id'=>$id));
        Yii::app()->db->createCommand()->delete('sotrydnik_navyk', 'sotrydnik_id=:id', array(':id'=>$id));
        Yii::app()->db->createCommand()->delete('sotrydnik_gruppa', 'sotrydnik_id=:id', array(':id'=>$id));

        return 0;
    }





    // 0 - все OK
    // <> 0 - код ошибки
    public function edit($id,$familia,$navyki,$gruppy,$nameste){


        if (strlen($familia) ===0) return 1;
        if (count($navyki)==0 || count($gruppy)==0) return 2;
        if ($id<=6) return 3;


        // Удал. старых
        Yii::app()->db->createCommand()->delete('sotrydnik_navyk', 'sotrydnik_id=:id', array(':id'=>$id));
        Yii::app()->db->createCommand()->delete('sotrydnik_gruppa', 'sotrydnik_id=:id', array(':id'=>$id));

        // Вставка новых
        foreach($navyki as $navyk_id)
            Yii::app()->db->createCommand()->insert('sotrydnik_navyk', array(
                'sotrydnik_id'=>$id,
                'navyk_id'=> $navyk_id,
            ));

        foreach($gruppy as $gruppa_id)
            Yii::app()->db->createCommand()->insert('sotrydnik_gruppa', array(
                'sotrydnik_id'=>$id,
                'gruppa_id'=> $gruppa_id,
            ));

        // Апдейт
        $affected = Yii::app()->db->createCommand()->update('sotrydnik', array(
            'familia'=>$familia,
            'nameste'=> $nameste ? 'y': 'n',
        ), 'id=:id', array(':id'=>$id));


        return 0;
    }

} 