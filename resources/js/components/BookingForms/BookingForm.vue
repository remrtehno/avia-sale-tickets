<template>
    <div class="wrapper-booking-forms">
        {{ number }} {{ title }}
        <button
            v-show="!hideDelete"
            type="button"
            class="btn btn-default btn-cf-submit3 booking-form-delete"
            @click="$emit('onClick')"
        >
            <i class="fa fa-minus-square"></i>
        </button>
        <div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Имя <span red>*</span></label
                >

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Michael"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Фамилия <span red>*</span></label
                >

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Dragan"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Отчество
                </label>

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Berkovich"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Email <span red>*</span></label
                >

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        data-inputmask="'alias': 'email'"
                        class="form-control"
                        placeholder="your@email.com"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Дата рождения <span red>*</span></label
                >

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        name="birthday"
                        data-inputmask="'alias': 'dategood'"
                        type="text"
                        class="form-control"
                        placeholder="____-__-__"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Пол <span red>*</span></label
                >

                <div
                    class="col-md-7"
                    style="padding-top: 11px; padding-left: 0"
                >
                    <label class="radio-inline my-0">
                        <input type="radio" name="gender" value="m" /> Мужской
                    </label>
                    <label class="radio-inline py-8 mx-15">
                        <input type="radio" name="gender" value="f" /> Женский
                    </label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Cрок паспорта <span red>*</span></label
                >

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        data-inputmask="'alias': 'dategood'"
                        type="text"
                        class="form-control"
                        placeholder="____-__-__"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Серия паспорта <span red>*</span></label
                >

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="AA_______"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Гражданство <span red>*</span></label
                >

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        type="text"
                        name="citizenship"
                        class="form-control"
                        placeholder="пример: Узбекистан"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <div
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                >
                    <label class="my-0">Телефон пассажира</label>
                    <small
                        class="text-muted"
                        style="line-height: 10px; display: block"
                        >Не свой, а именно пассажира <span red>*</span></small
                    >
                </div>

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        data-inputmask="'mask': '+\\9\\98(99) 999-99-99'"
                        type="tel"
                        class="form-control"
                        placeholder="+998(__) ___-__-__"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <div
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                >
                    <label class="my-0">Виза</label>
                    <small
                        class="text-muted"
                        style="line-height: 10px; display: block"
                        >(если требуется)</small
                    >
                </div>

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        type="text"
                        name="citizenship"
                        class="form-control"
                        placeholder="пример: Узбекистан"
                        spellcheck="false"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <div
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                >
                    <label class="my-0">Адрес</label>
                    <small
                        class="text-muted"
                        style="line-height: 10px; display: block"
                        >(если требуется)</small
                    >
                </div>

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        type="text"
                        class="form-control"
                        name="address"
                        placeholder="г. Ташкент ул. Истиклол д. 11"
                        spellcheck="false"
                    />
                </div>
            </div>

            <div class="clearfix"></div>
            <br />
            <small class="text-muted" style="line-height: 10px; display: block"
                >Поля обозначеные <span middle red>*</span> - обязательны к
                заполнению.</small
            >
        </div>
    </div>
</template>

<script>
export default {
    props: ["number", "title", "hideDelete"],
    methods: {
        triggerEvent() {
            $emit("onClick");
        },
    },
};
</script>

<style lang="scss">
.booking-form-delete {
    background: none;
}
</style>
