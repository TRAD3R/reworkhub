<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 09.03.19
 * Time: 14:03
 */

use app\modules\main\models\EmploymentTypes;
use app\modules\main\models\JobCategories;
use dosamigos\ckeditor\CKEditor;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $this \yii\web\View */
/** @var $model \app\modules\main\models\JobForm */
/** @var $jobCategories array */
/** @var $employmentTypes \app\modules\main\models\EmploymentTypes */

$this->title = Yii::$app->name . ' — ' . Yii::t('app', 'TITLE_POST_JOB');
?>

    <div class="block-jobs">
        <div class="container">
            <div class="holder-form">
                <a href="http://reworkhub.com/" class="btn-backwards">
                    <svg viewBox="0 0 8 12" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.871797 6.42828L6.26814 11.8228C6.50493 12.059 6.88857 12.059 7.12595 11.8228C7.36274 11.5866 7.36274 11.203 7.12595 10.9668L2.15764 6.0003L7.12535 1.03378C7.36214 0.797595 7.36214 0.413961 7.12535 0.177173C6.88856 -0.0590169 6.50433 -0.0590169 6.26754 0.177173L0.871199 5.57167C0.638049 5.80542 0.638049 6.19508 0.871797 6.42828Z"/>
                    </svg>
                    Назад
                </a>
                <?php $form = ActiveForm::begin()?>
                    <div class="hold-inputs">
                        <div class="box-input">
                            <?= $form->field($model, 'title')
                                ->input('text', ['id' => 'position-name', 'placeholder' => 'Frontend Developer'])
                                ->label(Yii::t('app', 'JOB_TITLE'), ['class' => 'title-input']) ?>
                        </div>
                        <div class="box-input">
                            <?= $form->field($model, 'jobCategories')
                                ->dropDownList(ArrayHelper::map(JobCategories::find()->orderBy('id')->all(), 'id', 'category')
                                    , [ 'class' => 'custom color'
                                        , 'prompt' => 'Выберите категорию'
                                        , 'data-jcf' => '{"wrapNative": false, "wrapNativeOnMobile": false, "fakeDropInBody": false, "useCustomScroll": false}'
                                        ]
                                )
                                ->label(Yii::t('app', 'JOB_CATEGORY'), ['class' => 'title-input'])?>
                        </div>
                    </div>
                    <div class="title-form">
                        <span class="sub-title-form"><?=Yii::t('app', 'JOB_COMPANY_ABOUT')?></span>
                    </div>
                    <div class="hold-center">
                        <div class="box-input">
                            <?= $form->field($model, 'companyTitle')
                                ->input('text', ['placeholder' => Yii::t('app', 'PH_PRINT_COMPANY_TITLE')])
                                ->label(Yii::t('app', 'JOB_COMPANY_TITLE'), ['class' => 'title-input']) ?>
                        </div>
                        <div class="box-input">
                            <?= $form->field($model, 'companyAbout')
                                ->widget(CKEditor::class, [
                                    'preset' => 'custom', 'clientOptions' => [
                                        'height' => '200px',
                                        'class' => 'editor textarea-big',
                                        'toolbarGroups' => [
                                            ['name' => 'undo'],
                                            ['name' => 'list'],
                                        ]
                                    ]
                                ])
                                ->label(Yii::t('app', 'JOB_COMPANY_ABOUT'), ['class' => 'title-input']) ?>
                        </div>
                        <div class="title-logos"><?=Yii::t('app', 'JOB_COMPANY_LOGO')?>:</div>
                        <div class="box-logos">
                            <div class="wrap-file">
                                <div class="hold-placeholder">
                                    <div class="hold-file-img"></div>
                                    <div class="file-placeholder"><?=Yii::t('app', 'ADD_LOGO_TO_VACANCY')?></div>
                                </div>
                                <?= $form->field($model, 'companyLogo')
                                    ->fileInput(['id' => 'input-file', 'accept' => 'image/png/jpg/jpeg/svg'])
                                    ->label(Yii::t('app', 'JOB_COMPANY_LOGO'), ['class' => 'file-label']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="title-form">
                        <span class="sub-title-form"><?=Yii::t('app', 'JOB_DESCRIPTION')?></span>
                    </div>
                    <div class="hold-center">
                        <div class="box-input editor">
                            <?= $form->field($model, 'requirements')
                                ->widget(CKEditor::class, [
                                    'preset' => 'custom', 'clientOptions' => [
                                        'bodyId' => 'ck-requirements',
                                        'height' => '200px',
                                        'class' => 'editor textarea-big',
                                        'toolbarGroups' => [
                                            ['name' => 'undo'],
                                            ['name' => 'list'],
                                        ]
                                    ]
                                ])
                                ->label(Yii::t('app', 'JOB_REQUIREMENTS'), ['class' => 'title-input']) ?>

                            <?= $form->field($model, 'duties')
                                ->widget(CKEditor::class, [
                                    'preset' => 'custom',
                                    'clientOptions' => [
                                        'bodyId' => 'ck-duties',
                                        'height' => '200px',
                                        'class' => 'editor textarea-big',
                                        'toolbarGroups' => [
                                            ['name' => 'undo'],
                                            ['name' => 'list'],
                                        ],
                                        'data' => "Hello",
                                    ]
                                ])
                                ->label(Yii::t('app', 'JOB_DUTIES'), ['class' => 'title-input']) ?>
                            
                            <?= $form->field($model, 'conditions')
                                ->widget(CKEditor::class, [
                                    'preset' => 'custom', 'clientOptions' => [
                                        'bodyId' => 'ck-conditions',
                                        'height' => '200px',
                                        'class' => 'editor textarea-big',
                                        'toolbarGroups' => [
                                            ['name' => 'undo'],
                                            ['name' => 'list'],
                                        ]
                                    ]
                                ])
                                ->label(Yii::t('app', 'JOB_CONDITIONS'), ['class' => 'title-input']) ?>
                        </div>
                        <div class="box-input">
                            <?= $form->field($model, 'employmentType')
                                ->dropDownList(ArrayHelper::map(EmploymentTypes::find()->orderBy('type')->all(), 'id', 'type')
                                    , ['id' => 'busy', 'class' => 'custom color', 'data-jcf' => '{"wrapNative": false, "wrapNativeOnMobile": false, "fakeDropInBody": false, "useCustomScroll": false}'])
                                ->label(Yii::t('app', 'JOB_EMPLOYMENT_TYPE'), ['class' => 'title-input'])?>
                        </div>
                        <div class="box-input">
                            <span class="title-input"><?=Yii::t('app', 'JOB_SALARY_LEVEL')?></span>
                            <div class="hold-inputs">
                                <div class="box-input three-elem">
                                    <?= Html::activeInput('number', $model, 'minSalary',
                                        ['id' => 'zp-from', 'name' => 'zp-from', 'maxlength' => 10, 'placeholder' => Yii::t('app', 'JOB_SALARY_FROM')]); ?>
                                </div>
                                <div class="box-input three-elem">
                                    <?= Html::activeInput('number', $model, 'maxSalary',
                                        ['id' => 'zp-to', 'name' => 'zp-to', 'maxlength' => 10, 'placeholder' => Yii::t('app', 'JOB_SALARY_TO')]); ?>
                                </div>
                                <div class="box-input three-elem">
                                    <?= Html::activeDropDownList($model, 'currency', ['rub' => 'RUB', 'usd' => 'USD', 'eur' => "EUR"]
                                        , ['id' => 'currency'
                                            , 'name' => 'currency'
                                            , 'class' => 'custom color'
                                            , 'data-jcf' => '{"wrapNative": false, "wrapNativeOnMobile": false, "fakeDropInBody": false, "useCustomScroll": false}'
                                            , 'value' => !empty($model->currency) ? $model->currency : "rub"
                                        ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="box-input">
                            <span class="title-input"><?=Yii::t('app', 'INPUT_SKILLS_DEVIDE_COMMA')?></span>
                            <?= $form->field($model, 'skills')
                                ->input('text', ['id' => 'contact-name', 'name' => 'skills'])
                                ->label(false) ?>
                        </div>
                    </div>

                    <div class="title-form last">
                        <span class="sub-title-form"><?=Yii::t('app', 'CONTACT_INFORMATION')?></span>
                    </div>
                    <div class="hold-center">
                        <div class="hold-inputs">
                            <div class="box-input">
                                <?= $form->field($model, 'contactPersonName')
                                    ->input('text')
                                    ->label(Yii::t('app', 'JOB_CONTACT_PERSON_NAME'), ['class' => 'title-input']) ?>
                            </div>
                            <div class="box-input">
                                <?= $form->field($model, 'contactPersonEmail')
                                    ->input('email', ['placeholder' => 'example@mail.ru'])
                                    ->label(Yii::t('app', 'JOB_CONTACT_PERSON_EMAIL'), ['class' => 'title-input']) ?>
                            </div>
                            <div class="box-input">
                                <?= $form->field($model, 'contactPersonOther')
                                    ->input('text', ['placeholder' => 'Например +380441234567'])
                                    ->label(Yii::t('app', 'JOB_CONTACT_PERSON_OTHER'), ['class' => 'title-input']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-error"><?= $form->field($model, 'token')->hiddenInput(['id' => 'token'])->label(false)?></div>
                <div id="trd-submit"><?= Html::submitButton(Yii::t('app', 'BTN_PREVIEW'), ['class' => 'btn']) ?></div>
                <?php ActiveForm::end()?>
            </div>
        </div>
    </div>

<?php
$js1 = "
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lew0ZoUAAAAADwqYCBxKYSnnEWmUgxh0nZwTE3w', {action: 'homepage'}).then(function(token) {
            $('#token').val(token);            
        });
    });";

    if($model->duties){
//        $js1 .= "CKEDITOR.instances['jobform-duties'].setData('{$model->duties}');";
    }else{
        $js1 .= "CKEDITOR.instances['jobform-duties'].setData('<ul><li></li></ul>');";
    }
    if($model->requirements){
//        $js1 .= "CKEDITOR.instances['jobform-requirements'].setData(" . $model->requirements .");";
    }else{
        $js1 .= "CKEDITOR.instances['jobform-requirements'].setData('<ul><li></li></ul>');";
    }
    if($model->conditions){
//        $js1 .= "CKEDITOR.instances['jobform-conditions'].setData(" . $model->conditions .");";
    }else{
        $js1 .= "CKEDITOR.instances['jobform-conditions'].setData('<ul><li></li></ul>');";
    }

$this->registerJs($js1);
?>

