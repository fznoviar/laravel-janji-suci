<script>
    /**
     * Profile component
     */
    export default {
        props: {
            name: {
                type: String,
                default: "Firza"
            },
            project: {
                type: Object,
                default: function () {
                    return {}
                }
            }
        },
        computed: {
            projectName () {
                return this.project.length > 0 && this.project.title.length > 0 ? this.project.title : "Skote"
            }
        }
    };
</script>
<template>
    <div class="card overflow-hidden">
        <div class="bg-soft-primary">
            <div class="row">
                <div class="col-7">
                    <div class="text-primary p-3">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p>{{ projectName }} Dashboard</p>
                    </div>
                </div>
                <div class="col-5 align-self-end">
                    <img src="images/profile-img.png" alt class="img-fluid" />
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-sm-4">
                    <div class="pt-4">
                        <h5 class="font-size-15 text-truncate">{{ name }}</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="pt-4">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-size-15">125</h5>
                                <p class="text-muted mb-0">Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-body -->
    </div>
    <!-- end card -->
</template>
