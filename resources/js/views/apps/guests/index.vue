<template>
    <Layout>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Guests</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Guests</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Table</h4>
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-6">
                                <div id="tickets-table_length" class="dataTables_length">
                                    <label class="d-inline-flex align-items-center">
                                        Show&nbsp;
                                        <b-form-select v-model="perPage" size="sm"
                                                       :options="pageOptions"></b-form-select>&nbsp;entries
                                    </label>
                                </div>
                            </div>
                            <!-- Search -->
                            <div class="col-sm-12 col-md-6">
                                <div id="tickets-table_filter" class="dataTables_filter text-md-right">
                                    <label class="d-inline-flex align-items-center">
                                        Search:
                                        <b-form-input
                                            v-model="filter"
                                            type="search"
                                            placeholder="Search..."
                                            class="form-control form-control-sm ml-2"
                                        ></b-form-input>
                                    </label>
                                </div>
                            </div>
                            <!-- End search -->
                        </div>
                        <div class="row mb-2">
                            <!-- Search -->
                            <div class="col-sm-12">
                                <div class="text-md-right">
                                    <a href="/guests/create" class="btn btn-primary btn-sm w-md" style="color: white">
                                        <i class="bx bx-plus font-size-16 align-middle mr-2"></i> Create
                                    </a>
                                    <a class="btn btn-primary btn-sm w-md" style="color: white"
                                       v-on:click.self.prevent="createEmptyGuest">
                                        <i class="bx bx-plus font-size-16 align-middle mr-2"></i> Create Empty Guest
                                    </a>
                                </div>
                            </div>
                            <!-- End search -->
                        </div>
                        <!-- Table -->
                        <div class="table-responsive mb-0">
                            <b-table
                                :items="guests.data"
                                :fields="fields"
                                responsive="sm"
                                :per-page="perPage"
                                :current-page="currentPage"
                                :sort-by.sync="sortBy"
                                :sort-desc.sync="sortDesc"
                                :filter="filter"
                                :filter-included-fields="filterOn"
                                @filtered="onFiltered"
                            >
                                <template #cell(actions)="row">
                                    <a :href="editRoute(row)" class="btn btn-success">Edit</a>
                                </template>
                            </b-table>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="dataTables_paginate paging_simple_numbers float-right">
                                    <ul class="pagination pagination-rounded mb-0">
                                        <!-- pagination -->
                                        <b-pagination v-model="currentPage" :total-rows="totalRows"
                                                      :per-page="perPage"></b-pagination>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
        components: {Layout},
        name: "guests",
        data() {
            return {
                guests: null,
                totalRows: 1,
                currentPage: 1,
                perPage: 10,
                pageOptions: [5, 10, 15, 25, 50, 100],
                filter: null,
                filterOn: [],
                sortBy: "name",
                sortDesc: false,
                fields: [
                    {key: "name", sortable: true},
                    {key: "email", sortable: true},
                    {key: "phone", sortable: false},
                    {key: "status", sortable: true},
                    {key: "code", sortable: true},
                    {key: "format", sortable: true},
                    {key: "created_at", sortable: true},
                    { key: 'actions', label: 'Actions' }
                ]
            };
        },
        watch: {
            guests(values) {
                this.perPage = values.meta.per_page
                this.currentPage = values.meta.current_page
                this.totalRows = values.meta.total
            }
        },
        methods: {
            fetchData() {
                axios
                    .get('/api/guests')
                    .then(response => {
                        // JSON responses are automatically parsed.
                        this.guests = response.data
                    });
            },
            createEmptyGuest() {
                axios
                    .post('/api/guests/emptiest', {
                        amount: 1
                    })
                    .then(response => {
                        this.fetchData();
                    })
            },
            /**
             * Search the table data with search input
             */
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1;
            },
            editRoute(row) {
                return '/guests/edit/' + row.item.code
            }
        },
        mounted() {
            this.fetchData()
        },
    }
</script>

<style scoped>

</style>
