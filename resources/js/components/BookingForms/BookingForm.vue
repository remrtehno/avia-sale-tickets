<template>
    <div class="wrapper-booking-forms">
        <input type="hidden" :value="type" :name="getType('type')" />
        <h5>{{ title }} {{ number }}</h5>
        <button
            v-show="!hideDelete"
            type="button"
            class="btn btn-default btn-cf-submit3 booking-form-btn-delete"
            @click="$emit('onClick')"
        >
            <i class="fa fa-close"></i>
        </button>
        <div class="booking-form">
            <div class="input2_wrapper">
                <div v-show="loggedIn" class="alert alert-warning px-10 py-5">
                    Поле <b>"Серия паспорта"</b> имеет автозаполнение
                </div>
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Серия паспорта <span red>*</span></label
                >

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        ref="passport_number"
                        type="text"
                        class="form-control"
                        placeholder="AA_______"
                        spellcheck="false"
                        :name="getType('passport_number')"
                        :value="current.passport_number"
                        @input="upper($event)"
                    />
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
                        placeholder="__-__-____"
                        spellcheck="false"
                        :name="getType('passport_date')"
                        :value="current.passport_date"
                    />
                </div>
            </div>
            <div class="clearfix"></div>
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
                        :name="getType('name')"
                        :value="current.name"
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
                        :name="getType('surname')"
                        :value="current.surname"
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
                        :name="getType('surname2')"
                        :value="current.surname2"
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
                        v-on:input="inputEmail"
                        v-on:blur="inputEmail"
                        data-inputmask="'alias': 'email'"
                        class="form-control"
                        placeholder="your@email.com"
                        spellcheck="false"
                        :name="getType('email')"
                        :value="current.email"
                        :disabled="disabledEmail"
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
                    <div v-if="type == 'child'">child</div>
                    <div v-else-if="type == 'infant'">infant</div>

                    <input
                        data-inputmask="'alias': 'birthday'"
                        type="text"
                        class="form-control"
                        placeholder="__-__-____"
                        spellcheck="false"
                        :name="getType('birthday')"
                        :value="current.birthday"
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
                        <input
                            type="radio"
                            :name="getType('gender')"
                            value="m"
                            :checked="current.gender === 'm'"
                        />
                        Мужской
                    </label>
                    <label class="radio-inline py-8 mx-15">
                        <input
                            type="radio"
                            :name="getType('gender')"
                            value="f"
                            :checked="current.gender === 'f'"
                        />
                        Женский
                    </label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <label
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                    >Гражданство <span red>*</span>
                </label>

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="пример: Узбекистан"
                        spellcheck="false"
                        :name="getType('citizenship')"
                        :value="current.citizenship"
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
                        >Не свой, а именно пассажира <span red>*</span>
                    </small>
                </div>

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <input
                        data-inputmask="'mask': '+\\9\\98(99) 999-99-99'"
                        type="tel"
                        class="form-control"
                        placeholder="+998(__) ___-__-__"
                        spellcheck="false"
                        :name="getType('tel')"
                        :value="current.tel"
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
                        class="form-control"
                        placeholder="пример: Узбекистан"
                        spellcheck="false"
                        :name="getType('visa')"
                        :value="current.visa"
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
                        placeholder="г. Ташкент ул. Истиклол д. 11"
                        spellcheck="false"
                        :name="getType('address')"
                        :value="current.address"
                    />
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="input2_wrapper">
                <div
                    class="col-md-5"
                    style="padding-left: 0; padding-top: 12px"
                >
                    <label :for="getType('bag')" class="my-0">С багажом</label>
                    <small
                        class="text-muted"
                        style="line-height: 10px; display: block"
                        >(если требуется)</small
                    >
                </div>

                <div class="col-md-7" style="padding-right: 0; padding-left: 0">
                    <label class="w-100">
                        <input
                            :id="getType('bag')"
                            type="checkbox"
                            class="form-control"
                            :name="getType('bag')"
                            v-model="current.bag"
                            value="1"
                        />
                    </label>
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
import { mapGetters } from "vuex";

export default {
    props: [
        "number",
        "title",
        "hideDelete",
        "type",
        "email",
        "disabledEmail",
        "formsData",
        "loggedIn",
    ],
    data() {
        return {
            customers: [],

            current: {
                passport_number: this.getValueFromFormsData("passport_number"),
                passport_date: this.getValueFromFormsData("passport_date"),
                name: this.getValueFromFormsData("name"),
                surname: this.getValueFromFormsData("surname"),
                surname2: this.getValueFromFormsData("surname2"),
                birthday: this.getValueFromFormsData("birthday"),
                gender: this.getValueFromFormsData("gender"),
                citizenship: this.getValueFromFormsData("citizenship"),
                tel: this.getValueFromFormsData("tel"),
                visa: this.getValueFromFormsData("visa"),
                address: this.getValueFromFormsData("address"),
                bag: this.getValueFromFormsData("bag"),
            },
        };
    },
    methods: {
        triggerEvent() {
            $emit("onClick");
        },
        getType(nameField) {
            return `${this.type}[${this.number}][${nameField}]`;
        },
        getValueFromFormsData(nameField) {
            if (!nameField || !this.formsData[this.type]) {
                return "";
            }
            return this.formsData[this.type][this.number][nameField];
        },
        inputEmail(evt) {
            this.$emit("input", evt.target.value);
        },
        upper(e) {
            e.target.value = e.target.value.toUpperCase();
        },
    },

    mounted() {
        const uuid = this._uid;

        this.$store.commit("setFormBags", {
            ...this.$store.getters.formBags,
            [this.type]: [
                ...(this.$store.getters.formBags[this.type] || []),
                {
                    uuid,
                    bag: 0,
                },
            ],
        });

        $(this.$refs.passport_number).autocomplete({
            minLength: 3,
            source: async ({ term }, result) => {
                const user_id = $('[name="user_id"]').val();

                if (!user_id) {
                    return result(this.customers);
                }

                const { data } = await axios.get("/api/v1/customer-contacts", {
                    params: {
                        passport_number: term,
                        user_id,
                        type: this.type,
                    },
                });

                this.customers = data.customers;

                result(
                    this.customers.map(({ passport_number }) => passport_number)
                );
            },
            select: (event, ui) => {
                this.current = this.customers.find(
                    ({ passport_number }) => passport_number === ui.item.value
                );
            },
        });
    },
    watch: {
        "current.bag"() {
            const value = this.current.bag ? 1 : 0;

            this.$store.commit("setFormBags", {
                ...this.$store.getters.formBags,
                [this.type]: this.$store.getters.formBags[this.type].map(
                    (form) => {
                        return form.uuid === this._uid
                            ? { uuid: form.uuid, bag: value }
                            : form;
                    }
                ),
            });
        },
    },

    computed: {
        ...mapGetters(["bookingForms", "formBags"]),
    },

    destroyed() {
        this.$store.commit("setFormBags", {
            ...this.$store.getters.formBags,
            [this.type]: this.$store.getters.formBags[this.type].filter(
                ({ uuid }) => uuid !== this._uid
            ),
        });
    },
};
</script>

<style lang="scss">
.wrapper-booking-forms {
    position: relative;
    margin-bottom: 15px;
    border-bottom: 1px solid #eee;
    padding-bottom: 25px;
    input[disabled="disabled"] {
        opacity: 0.5;
    }
}
.booking-form-delete {
    background: none;
}
.btn-default.btn-cf-submit3.booking-form-btn-delete {
    border-radius: 100px !important;
    padding: 0;
    width: 30px;
    height: 30px;
    outline: none;
    box-shadow: none;
    background: none;
    color: #a8a6a6;
    border: 1px solid #c5c4c4;
    position: absolute;
    right: 0;
    top: 15px;
    &:hover {
        color: red;
    }
}

input[type="checkbox"] {
    width: auto;
    height: auto !important;
}
</style>

<style scoped lang="scss">
.booking-form {
    columns: 2;
    column-gap: 25px;
    @media (max-width: 992px) {
        columns: unset;
    }
}
</style>
