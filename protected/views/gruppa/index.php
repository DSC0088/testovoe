<h1>Группы</h1>


<div id="gruppaAddModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Добавление группы</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('form');?>
            </div>
            <div class="modal-footer">
                <button
                    data-url="<?php echo Yii::app()->createUrl('gruppa/create');?>"
                    type="button" class="btn btn-primary gruppaAddSubmit">Добавить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>





<div id="gruppaEditModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Правка группы</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('form');?>
            </div>
            <div class="modal-footer">
                <button
                    data-url="<?php echo Yii::app()->createUrl('gruppa/edit');?>"
                    type="button" class="btn btn-primary gruppaEditSubmit">Сохранить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>







<a class="btn btn-default gruppaAdd" href="<?php echo Yii::app()->createUrl('gruppa/create');?>">
    <span class="glyphicon glyphicon-plus"></span> Добавить
</a>
<br /><br />



<?php if(count($gruppa) > 0):?>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>Группа</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($gruppa as $k=>$v):?>
            <tr>
                <td><?php echo $k;?></td>
                <td><?php echo $v;?></td>
                <td>
                    <a class="glyphicon glyphicon-pencil gruppaEdit"
                       data-id="<?php echo $k;?>"
                       data-naz="<?php echo $v;?>"
                    ></a>
                    <a class="glyphicon glyphicon-remove gruppaDelSubmit"
                       data-id="<?php echo $k;?>"
                       data-url="<?php echo Yii::app()->createUrl('gruppa/del');?>"
                    ></a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php else:?>

    <p class="bg-danger">Групп не найдено</p>
<?php endif;?>
