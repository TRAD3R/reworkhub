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
                                    'options' => ['rows' => 8, 'class' => 'about-company', 'id' => 'about-company'],
                                    'preset' => 'basic'
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
                                    ->fileInput(['id' => 'input-file', 'accept' => 'image/png/jpg/jpeg'])
                                    ->label(Yii::t('app', 'JOB_COMPANY_LOGO'), ['class' => 'file-label']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="title-form">
                        <span class="sub-title-form"><?=Yii::t('app', 'JOB_DESCRIPTION')?></span>
                    </div>
                    <div class="hold-center">
                        <div class="box-input">
                            <?= $form->field($model, 'description')
                                ->widget(CKEditor::class, [
                                    'clientOptions' => ['height' => '100px', 'class' => 'editor textarea-big'],
                                    'preset' => 'standard'
                                ])
                                ->label(Yii::t('app', 'JOB_DESCRIPTION'), ['class' => 'title-input']) ?>
                            <?= $form->field($model, 'duties')
                                ->widget(CKEditor::class, [
                                    'clientOptions' => ['height' => '200px', 'class' => 'editor textarea-big'],
                                    'preset' => 'standard'
                                ])
                                ->label(Yii::t('app', 'JOB_REQUIREMENTS'), ['class' => 'title-input']) ?>
                            <?= $form->field($model, 'requirements')
                                ->widget(CKEditor::class, [
                                    'clientOptions' => ['height' => '200px', 'class' => 'editor textarea-big'],
                                    'preset' => 'standard'
                                ])
                                ->label(Yii::t('app', 'JOB_CONDITIONS'), ['class' => 'title-input']) ?>
                            <?= $form->field($model, 'conditions')
                                ->widget(CKEditor::class, [
                                    'clientOptions' => ['height' => '200px', 'class' => 'editor textarea-big'],
                                    'preset' => 'standard'
                                ])
                                ->label(Yii::t('app', 'JOB_DUTIES'), ['class' => 'title-input']) ?>
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
                                <?= $form->field($model, 'contactPersonPhone')
                                    ->input('number', ['placeholder' => 'Например +380441234567'])
                                    ->label(Yii::t('app', 'JOB_CONTACT_PERSON_PHONE'), ['class' => 'title-input']) ?>
                            </div>
                        </div>
                    </div>
                    <div><?= $form->field($model, 'token')->hiddenInput(['id' => 'token'])->label(false)?></div>
                <div id="trd-submit"><?= Html::submitButton(Yii::t('app', 'BTN_PREVIEW'), ['class' => 'btn']) ?></div>
                <?php ActiveForm::end()?>
            </div>
        </div>
    </div>

<?php
$js1 = <<<JS
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lew0ZoUAAAAADwqYCBxKYSnnEWmUgxh0nZwTE3w', {action: 'homepage'}).then(function(token) {
            $("#token").val(token);
            // $.ajax({
            //     method: "POST",
            //     url: "/main/default/ajax-recaptcha",
            //     data: {
            //         token: token
            //     },
            //     success: function (data) {
            //         if(data.indexOf()){
            //            
            //         }else{}
            //     }
            // })
        });
    });
JS;

$this->registerJs($js1);
?>