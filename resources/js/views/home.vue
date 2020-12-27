<script>
    import Layout from "../layouts/main";
    import Profile from "../components/widgets/profile";

    /**
     * Dashboard Component
     */
    export default {
        components: {Layout, Profile},
        data() {
            return {
                title: "Dashboard",
                project: {
                    data: {}
                },
                guests: {
                    title: "pages.dashboard.guests.title",
                    data: [
                        {
                            index: 1,
                            label: "pages.dashboard.guests.total",
                            taken: 1,
                            limit: 50,
                            color: "primary"
                        },
                        {
                            index: 2,
                            label: "pages.dashboard.guests.wa",
                            taken: 1,
                            limit: 15,
                            color: "success"
                        }
                    ]
                },
                events: {
                    title: "pages.dashboard.events.title",
                    data: {
                        day: 5,
                        monthYear: "Nov 2020",
                        events: [
                            {
                                index: 1,
                                title: "Akad Nikah",
                                time: "08.00 - Selesai",
                                location: "Gedung 1"
                            },
                            {
                                index: 2,
                                title: "Resepsi Nikah",
                                time: "18.00 - 20.00",
                                location: "Gedung 2"
                            }
                        ]
                    }
                },
                statistics: {
                    title: "pages.dashboard.statistics.title",
                    data: {}
                },
                donutChart: {
                    series: [44, 55, 41, 17, 15],
                    chartOptions: {
                        labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
                        colors: ["#34c38f", "#556ee6", "#f46a6a", "#50a5f1", "#f1b44c"],
                        legend: {
                            show: true,
                            position: 'right',
                            horizontalAlign: 'center',
                            verticalAlign: 'middle',
                            floating: false,
                            fontSize: '14px',
                            offsetX: 0,
                            offsetY: -10
                        },
                        dataLabels: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        name: {
                                            show: true
                                        },
                                        value: {
                                            show: true
                                        },
                                        total: {
                                            show: true
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            };
        }
    };
</script>

<template>
    <Layout>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to Janji Suci Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <Profile/>
            </div>
            <!-- end col -->
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ $t(guests.title) }}</h4>

                        <div class="table-responsive mt-4">
                            <table class="table table-centered">
                                <tbody>
                                <tr v-for="guest of guests.data" :key="guest.index">
                                    <td style="width: 140px">
                                        <p class="mb-0">{{ $t(guest.label) }}</p>
                                    </td>
                                    <td style="width: 120px">
                                        <h5 class="mb-0">{{ guest.taken }}/{{ guest.limit }}</h5>
                                    </td>
                                    <td>
                                        <b-progress :value="(guest.taken/guest.limit)*100" :variant="guest.color"
                                                    height="5px"></b-progress>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ $t(guests.title) }}</h4>

                        <div class="table-responsive mt-4">
                            <table class="table table-centered">
                                <tbody>
                                <tr v-for="guest of guests.data" :key="guest.index">
                                    <td style="width: 140px">
                                        <p class="mb-0">{{ $t(guest.label) }}</p>
                                    </td>
                                    <td style="width: 120px">
                                        <h5 class="mb-0">{{ guest.taken }}/{{ guest.limit }}</h5>
                                    </td>
                                    <td>
                                        <b-progress :value="(guest.taken/guest.limit)*100" :variant="guest.color"
                                                    height="5px"></b-progress>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ $t(events.title) }}</h4>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center py-4 pr-3 border-right">
                                    <div class="avatar-sm mx-auto mb-2">
                                        <span class="avatar-title rounded-circle bg-soft-info text-info "
                                        >{{ events.data.day }}</span>
                                    </div>
                                    <h5 class="text-truncate">{{ events.data.monthYear}}</h5>
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="px-3 py-1" v-for="event of events.data.events" :key="event.index">
                                    <div class="mb-3">
                                        <div class="row">
                                            <h6>{{ event.title}}</h6>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto p-0 mr-4">
                                                <p class="mb-0"><i class="bx bx-time-five"></i> {{ event.time }}</p>
                                            </div>
                                            <div class="col-auto p-0">
                                                <p class="mb-0"><i class="bx bxs-map"></i> <span class="text-secondary"> {{ event.location }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-right mr-2">
                                    <a href="#">See profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ $t(statistics.title) }}</h4>

                        <div class="row">
                            <div class="col-12">
                                <apexchart
                                    class="apex-charts"
                                    height="150"
                                    width="300"
                                    type="donut"
                                    dir="ltr"
                                    :series="donutChart.series"
                                    :options="donutChart.chartOptions"
                                ></apexchart>
                            </div>
                            <div class="col-12">
                                <div class="text-right mr-2">
                                    <a href="#">See profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </Layout>
</template>
