<template>
    <Layout>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Guests</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><a href="/guests">Guests</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Horizontal form layout</h4>

                        <b-form>
                            <b-form-group
                                label="Name"
                                label-for="horizontal-name-input"
                                label-cols-sm="3"
                            >
                                <b-form-input id="horizontal-name-input" type="text" v-model="name"></b-form-input>
                            </b-form-group>

                            <b-form-group
                                label="Phone"
                                label-for="horizontal-phone-input"
                                label-cols-sm="3"
                            >
                                <b-form-input id="horizontal-phone-input" type="text" v-model="phone"></b-form-input>
                            </b-form-group>

                            <b-form-group
                                class="mb-4"
                                label="Email"
                                label-for="horizontal-email-input"
                                label-cols-sm="3"
                            >
                                <b-form-input id="horizontal-email-input" type="email" v-model="email"></b-form-input>
                            </b-form-group>

                            <b-form-group
                                label="Address"
                                label-for="horizontal-address-input"
                                label-cols-sm="3"
                            >
                                <textarea
                                    id="horizontal-address-input"
                                    v-model="address"
                                    class="form-control"
                                    :maxlength="225"
                                    rows="3"
                                ></textarea>
                            </b-form-group>

                            <b-form-group
                                label="Format"
                                label-for="horizontal-format-input"
                                label-cols-sm="3"
                            >
                                <b-form-radio
                                    v-model="formatId"
                                    class="custom-radio mb-3"
                                    value="1"
                                >Digital</b-form-radio>
                                <b-form-radio
                                    v-model="formatId"
                                    class="custom-radio mb-3"
                                    value="2"
                                >Physical</b-form-radio>
                            </b-form-group>

                            <b-form-group
                                label="VIP"
                                label-for="horizontal-address-input"
                                label-cols-sm="3"
                            >
                                <b-form-checkbox v-model="isVip" switch class="mb-1">
                                </b-form-checkbox>
                            </b-form-group>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <b-button variant="primary" v-on:click="createGuest">Submit</b-button>
                                        <a href="/guests" class="btn btn-outline-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-show="isErrors">
                                <div class="col-md-12">
                                    <b-alert v-for="(val, key) in errors" :key="key" show dismissible variant="danger">{{ val[0] }}</b-alert>
                                </div>
                            </div>
                        </b-form>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
    import Layout from "../../../layouts/main";
    import axios from 'axios';

    export default {
        name: "create",
        components: {Layout},
        data() {
            return {
                name: null,
                phone: null,
                email: null,
                address: null,
                formatId: 1,
                isVip: false,
                errors: null
            }
        },
        methods: {
            createGuest() {
                axios
                    .post('/api/guests', {
                        name: this.name,
                        phone_number: this.phone,
                        email: this.email,
                        address: this.address,
                        format_id: this.formatId,
                        is_vip: this.isVip
                    })
                    .then(response => {
                        this.errors = null
                        window.location.href = '/guests'
                    })
                    .catch(e => {
                        this.errors = e.response.data.errors
                    });
            }
        },
        computed: {
            isErrors() {
                return null != this.errors
            }
        }
    }
</script>

<style scoped>

</style>
