<template>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="card p-5">

                <!-- Step 1 Basics -->
                <div v-if="step == 0" class="card-body">
                    <div class="card-title text-center">
                        <h2>Tournament basics</h2>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="col-form-label text-md-end">Name</label>
                        <input id="name" placeholder="Enter tournament name" type="name" class="form-control" name="name"
                            v-model="tournament.name" required autocomplete="name" autofocus>
                        <span v-if="errors.name" class="text-danger" role="alert">
                            <strong>{{ errors.name[0] }}</strong>
                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="col-form-label text-md-end">Description</label>
                        <textarea id="description" placeholder="Enter tournament description" type="description"
                            class="form-control" name="description" v-model="tournament.description" required
                            autocomplete="description" autofocus></textarea>
                        <span v-if="errors.description" class="text-danger" role="alert">
                            <strong>{{ errors.description[0] }}</strong>
                        </span>
                    </div>


                    <div class="form-group mb-3">
                        <label for="banner" class="col-form-label text-md-end d-flex flex-column">
                            <span class="text-start">Upload banner</span>
                            <div class="btn btn-info form-control mt-2">
                                <i class="bi bi-image h2 text-start"></i>
                            </div>
                        </label>
                        <input id="banner" placeholder="Upload banner" type="file" class="form-control d-none" name="banner"
                            required autocomplete="banner" autofocus @change="setBanner">
                        <span v-if="errors.banner" class="text-danger" role="alert">
                            <strong>{{ errors.banner[0] }}</strong>
                        </span>
                    </div>

                    <div class="form-group mb-5">
                        <label for="game_id" class="col-form-label text-md-end">Game</label>
                        <select id="game_id" placeholder="Enter tournament game" type="game_id"
                            class="form-select form-control" name="game_id" v-model="tournament.game_id" required
                            autocomplete="game_id" autofocus>
                            <option value="-1" disabled selected hidden>Choose game</option>
                            <option v-for="game in games" v-bind:value="game.id">{{ game.name }}</option>
                            <span v-if="errors.game_id" class="text-danger" role="alert">
                                <strong>{{ errors.game_id[0] }}</strong>
                            </span>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="btn-primary btn" @click.prevent="nextStep()">next</div>
                    </div>
                </div>

                <!-- Step 2 (settings) -->
                <div v-if="step == 1" class="card-body">
                    <div class="card-title text-center">
                        <h2>Tournament settings</h2>
                    </div>
                    <div class="form-group mb-3">
                        <label for="start" class="col-form-label text-md-end">Start date</label>
                        <input id="start" type="datetime-local" class="form-control" name="start" v-model="tournament.start"
                            required autocomplete="start" autofocus>
                        <span v-if="errors.start" class="text-danger" role="alert">
                            <strong>{{ errors.start[0] }}</strong>
                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="team_size" class="col-form-label text-md-end">Team size</label>
                        <input id="team_size" type="number" class="form-control" name="team_size"
                            v-model="tournament.team_size" required autocomplete="team_size" autofocus>
                        <span v-if="errors.team_size" class="text-danger" role="alert">
                            <strong>{{ errors.team_size[0] }}</strong>
                        </span>
                    </div>


                    <div class="form-group mb-3">
                        <label for="team_amount" class="col-form-label text-md-end">Max. amount of teams</label>
                        <input id="team_amount" type="number" class="form-control" name="team_amount"
                            v-model="tournament.team_amount" required autocomplete="team_amount" autofocus>
                        <span v-if="errors.team_amount" class="text-danger" role="alert">
                            <strong>{{ errors.team_amount[0] }}</strong>
                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="format" class="col-form-label text-md-end">Tournament format</label>
                        <select id="format" type="format" class="form-select form-control" name="format"
                            v-model="tournament.format" required autocomplete="format" autofocus>
                            <option value="-1" disabled selected hidden>Choose format</option>
                            <option value="1">Single elemination</option>
                            <option value="2">Double elemination</option>
                        </select>
                        <span v-if="errors.format" class="text-danger" role="alert">
                            <strong>{{ errors.format[0] }}</strong>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div v-if="errors.name || errors.banner || errors.description || errors.game_id" class="btn-info btn text-white" @click.prevent="backStep()">back <span class="text-danger">*</span></div>
                        <div v-else class="btn-info text-white btn" @click.prevent="backStep()">back</div>
                        <div class="btn-primary btn" @click.prevent="handleSave()">Create</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        games: Array,
    },
    data: function () {
        return {
            step: 0,
            tournament: {
                'name': "",
                'description': "",
                'banner': "",
                'game_id': -1,
                'start': "",
                'team_size': 2,
                'team_amount': 4,
                'format': -1,
            },
            errors: [],
        };
    },
    methods: {
        nextStep() {
            this.step++;
        },
        backStep() {
            this.step--;
        },
        handleSave() {

            axios.post('/tournament',
                this.parseToFormData(Object.keys(this.tournament)), {
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
            })
                .then(res => {
                    window.location.href = res.data.route;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
        setBanner(event) {
            this.tournament.banner = event.target.files[0];
        },
        parseToFormData(keys) {
            let formData = new FormData();
            keys.forEach(key => {
                formData.append(key, this.tournament[key]);
            });
            console.log(formData);
            return formData;
        }
    },
    mounted() {

    },
}

</script>