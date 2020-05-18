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
use himiklab\yii2\recaptcha\ReCaptcha;
use yii\Helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $this \yii\web\View */
/** @var $model \app\modules\main\forms\JobForm */
/** @var $jobCategories array */
/** @var $employmentTypes \app\modules\main\models\EmploymentTypes */

$this->title = Yii::$app->name . ' — ' . Yii::t('app', 'TITLE_POST_JOB');
?>
<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
} ?>
    <div class="block-jobs">
        <div class="container">
            <div class="holder-form">
                <a href="/" class="btn-backwards">
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
                                ->label(Yii::t('app', 'JOB_TITLE'), ['class' => 'title-input required']) ?>
                        </div>
                        <div class="box-input">
                            <?= $form->field($model, 'jobCategories')
                                ->dropDownList(ArrayHelper::map(JobCategories::find()->orderBy('weight')->all(), 'id', 'category')
                                    , [ 'class' => 'custom color'
                                        , 'prompt' => 'Выберите категорию'
                                        , 'data-jcf' => '{"wrapNative": false, "wrapNativeOnMobile": false, "fakeDropInBody": false, "useCustomScroll": false}'
                                        ]
                                )
                                ->label(Yii::t('app', 'JOB_CATEGORY'), ['class' => 'title-input required'])?>
                        </div>
                    </div>
                    <div class="title-form">
                        <span class="sub-title-form"><?=Yii::t('app', 'JOB_COMPANY_ABOUT')?></span>
                    </div>
                    <div class="hold-center">
                        <div class="box-input">
                            <?= $form->field($model, 'companyTitle')
                                ->input('text', ['placeholder' => Yii::t('app', 'PH_PRINT_COMPANY_TITLE')])
                                ->label(Yii::t('app', 'JOB_COMPANY_TITLE'), ['class' => 'title-input required']) ?>
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
                                ->label(Yii::t('app', 'JOB_REQUIREMENTS'), ['class' => 'title-input required']) ?>

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
                                ->label(Yii::t('app', 'JOB_DUTIES'), ['class' => 'title-input required']) ?>

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
                                ->label(Yii::t('app', 'JOB_CONDITIONS'), ['class' => 'title-input required']) ?>
                        </div>
                        <div class="box-input">
                            <?= $form->field($model, 'employmentType')
                                ->dropDownList(ArrayHelper::map(EmploymentTypes::find()->orderBy('type')->all(), 'id', 'type')
                                    , ['id' => 'busy', 'class' => 'custom color', 'data-jcf' => '{"wrapNative": false, "wrapNativeOnMobile": false, "fakeDropInBody": false, "useCustomScroll": false}'])
                                ->label(Yii::t('app', 'JOB_EMPLOYMENT_TYPE'), ['class' => 'title-input required'])?>
                        </div>
                        <div class="box-input">
                            <label class="title-input required"><?=Yii::t('app', 'JOB_SALARY_LEVEL')?></label>
                            <div class="hold-inputs">
                                <div class="box-input three-elem">
                                    <?= Html::activeInput('number', $model, 'minSalary',
                                        ['id' => 'zp-from', 'maxlength' => 10, 'placeholder' => Yii::t('app', 'JOB_SALARY_FROM')]); ?>
                                </div>
                                <div class="box-input three-elem">
                                    <?= Html::activeInput('number', $model, 'maxSalary',
                                        ['id' => 'zp-to', 'maxlength' => 10, 'placeholder' => Yii::t('app', 'JOB_SALARY_TO')]); ?>
                                </div>
                                <div class="box-input three-elem">
                                    <?= Html::activeDropDownList($model, 'currency', ['rub' => 'RUB', 'usd' => 'USD', 'eur' => "EUR"]
                                        , ['id' => 'currency'
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
                                ->input('text', ['id' => 'contact-name'])
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
                                    ->label(Yii::t('app', 'JOB_CONTACT_PERSON_NAME'), ['class' => 'title-input required']) ?>
                            </div>
                            <div class="box-input">
                                <?= $form->field($model, 'contactPersonEmail')
                                    ->input('email', ['placeholder' => 'example@mail.ru'])
                                    ->label(Yii::t('app', 'JOB_CONTACT_PERSON_EMAIL'), ['class' => 'title-input required']) ?>
                            </div>
                            <div class="box-input-full">
                                <?= $form->field($model, 'contactPersonOther')
                                    ->textarea()
                                    ->label(Yii::t('app', 'JOB_CONTACT_PERSON_OTHER'), ['class' => 'title-input']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="hold-center">
                      <label class="checkbox">
                        <input type="checkbox" data-id="3" checked required>
                        <span class="checkbox-box">
                          <svg width="13" height="11" viewBox="0 0 12 10" xmlns="http://www.w3.org/2000/svg">
                              <path d="M11.7832 1.67096L10.7303 0.61808C10.586 0.473602 10.4104 0.401337 10.204 0.401337C9.99744 0.401337 9.82186 0.473602 9.67749 0.61808L4.59871 5.70454L2.32257 3.42064C2.17803 3.27611 2.00256 3.20392 1.79618 3.20392C1.58966 3.20392 1.41419 3.27611 1.26965 3.42064L0.21677 4.47355C0.0722387 4.61805 0 4.79358 0 5.00007C0 5.2064 0.0722387 5.38209 0.21677 5.52657L3.0193 8.32904L4.07227 9.38193C4.21672 9.52651 4.39224 9.5987 4.59871 9.5987C4.80509 9.5987 4.98062 9.52632 5.12515 9.38193L6.17809 8.32904L11.7832 2.72393C11.9276 2.5794 12 2.4039 12 2.19741C12.0001 1.99102 11.9276 1.8155 11.7832 1.67096Z" fill="inherit"></path>
                          </svg>
                        </span>
                        <span class="checkbox-text required">Я соглашаюсь с правилами <a class="c-accent" href="<?= Url::to('/rules')?>" target="_blank">udalyonka</a></span>
                      </label>
                    </div>
                    <?php echo $form->field($model, 'reCaptcha')->widget(
                        ReCaptcha::class,
                        [
                            'siteKey' => '6LcBgZYUAAAAAKkARW9Ch0y8gvlLGvOr9by2w0lq', // unnecessary is reCaptcha component was set up
                        ]
                    )->label(false) ?>
                <div id="trd-submit"><?= Html::submitButton(Yii::t('app', 'BTN_PREVIEW'), ['class' => 'btn']) ?></div>
                <?php ActiveForm::end()?>
            </div>
        </div>
    </div>

<?php
$js1 = "";

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

