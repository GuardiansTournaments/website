<template>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body p-5">
                    <div class="col-lg-10 d-flex justify-content-between align-items-center">
                        <h2>Settings</h2>
                        <!-- <div class="lds-ring"><div></div><div></div><div></div><div></div></div> -->
                    </div>
                    <form id="edituser" class="row d-flex">
                        <!-- Avatar -->
                        <div class="form-group mb-5 col-lg-12 d-flex justify-content-center">
                            <div class="col-lg-2">
                                <label for="banner" class="col-form-label text-md-end d-flex flex-column">
                                    <div class="position-relative d-flex justify-content-center">
                                        <img class="rounded-circle avatar" width="100"
                                            v-bind:src="originPath + this.userForm.avatar" alt=""
                                            style="margin-left: auto; margin-right:auto; display: block;">
                                        <div class="position-absolute bg-dark rounded-circle opacity-75"
                                            style="width:100px; height: 100px; padding-top: 35px; padding-right: 8px; font-size: 1.2rem;">
                                            <i class="bi bi-pencil-fill" style="margin: 50%;"></i>
                                        </div>
                                    </div>
                                </label>
                                <input id="banner" type="file" class="form-control d-none" name="avatar"
                                    @change="avatarPreview">
                                <span v-if="errors.avatar" class="text-danger" role="alert">
                                    <strong>{{ errors.avatar[0] }}</strong>
                                </span>
                                <span id="successavatar" class="text-success mt-2 s-msg justify-content-center" role="alert"
                                    style="display: none;">
                                    <strong>Saved!</strong>
                                </span>
                                <div id="saveavatar" @click="save('successavatar', 'avatar', userForm.avatar)"
                                    class="mt-3 sbtn btn btn-primary justify-content-center" style="display: none;">
                                    <span>Save</span>
                                </div>
                            </div>
                        </div>

                        <!-- Nickname -->
                        <div class="form-group mb-3 col-lg-4">
                            <label for="nickname" class="col-form-label text-md-end">Nickname</label>
                            <input id="nickname" @input="toggleSave('savenickname')" :placeholder="user.nickname"
                                type="text" class="form-control" name="nickname" v-model="userForm.nickname">
                            <span v-if="errors.nickname" class="text-danger mt-2" role="alert">
                                <strong>{{ errors.nickname[0] }}</strong>
                            </span>
                            <span id="successnickname" class="text-success mt-2 s-msg" role="alert" style="display: none;">
                                <strong>Saved!</strong>
                            </span>
                            <div id="savenickname" @click="save('successnickname', 'nickname', userForm.nickname)"
                                class="mt-3 sbtn btn btn-primary justify-content-center" style="display: none;">
                                <span>Save</span>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3 col-lg-4">
                            <label for="email" class="col-form-label text-md-end">Email</label>
                            <input id="email" @input="toggleSave('saveemail')" :placeholder="user.email" type="text"
                                class="form-control" name="email" v-model="userForm.email">
                            <span v-if="errors.email" class="text-danger mt-2" role="alert">
                                <strong>{{ errors.email[0] }}</strong>
                            </span>
                            <span id="successemail" class="text-success mt-2 s-msg" role="alert" style="display: none;">
                                <strong>Saved!</strong>
                            </span>
                            <div id="saveemail" @click="save('successemail', 'email', userForm.email)"
                                class="mt-3 sbtn btn btn-primary justify-content-center" style="display: none;">
                                <span>Save</span>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3 col-lg-4">
                            <label for="password" class="col-form-label text-md-end">Password</label>
                            <input id="password" @input="toggleSave('savepassword')" placeholder="Enter new password"
                                type="password" class="form-control" name="password" v-model="userForm.password" required>
                            <span v-if="errors.password" class="text-danger mt-2" role="alert">
                                <strong>{{ errors.password[0] }}</strong>
                            </span>
                            <span id="successpassword" class="text-success mt-2 s-msg" role="alert" style="display: none;">
                                <strong>Saved!</strong>
                            </span>
                            <div id="savepassword" @click="save('successpassword', 'password', userForm.password)"
                                class="mt-3 sbtn btn btn-primary justify-content-center" style="display: none;">
                                <span>Save</span>
                            </div>
                        </div>

                        <hr class="mt-5 mb-5" />

                        <!-- Birth -->
                        <div class="form-group mb-3 col-lg-4">
                            <label for="birth" class="col-form-label text-md-end">Day of birth</label>
                            <input id="birth" @input="toggleSave('savebirth')" type="date" class="form-control" name="birth"
                                v-model="userForm.birth" required autocomplete="birth">
                            <span v-if="errors.birth" class="text-danger mt-2" role="alert">
                                <strong>{{ errors.birth[0] }}</strong>
                            </span>
                            <span id="successbirth" class="text-success mt-2 s-msg" role="alert" style="display: none;">
                                <strong>Saved!</strong>
                            </span>
                            <div id="savebirth" @click="save('successbirth', 'birth', userForm.birth)"
                                class="mt-3 sbtn btn btn-primary justify-content-center" style="display: none;">
                                <span>Save</span>
                            </div>
                        </div>

                        <!-- Platform -->
                        <div class="form-group mb-3 col-lg-4">
                            <label for="platform" class="col-form-label text-md-end">Platform</label>
                            <select id="platform" @change="toggleSave('saveplatform')" placeholder="Enter tournament game"
                                type="text" class="form-select form-control" name="platform" v-model="userForm.platform"
                                required>
                                <option value="nintendo-switch">Nintendo</option>
                                <option value="steam">Steam</option>
                                <option value="playstation">Playstation</option>
                            </select>
                            <span v-if="errors.platform" class="text-danger mt-2" role="alert">
                                <strong>{{ errors.platform[0] }}</strong>
                            </span>
                            <span id="successplatform" class="text-success mt-2 s-msg" role="alert" style="display: none;">
                                <strong>Saved!</strong>
                            </span>
                            <div id="saveplatform" @click="save('successplatform', 'platform', userForm.platform)"
                                class="mt-3 sbtn btn btn-primary justify-content-center" style="display: none;">
                                <span>Save</span>
                            </div>
                        </div>



                    </form>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        user: Object,
    },
    data() {
        return {
            userForm: this.user,
            errors: [],
            message: "",
            originPath: window.location.origin,
        };
    },
    methods: {
        toggleSave(id) {
            $('.sbtn').hide();
            if (id) {
                $('#' + id).css('display', 'flex');
            }
        },

        save(id, field, formData) {
            this.toggleSave();
            let data = new FormData();
            data.append('_method', 'patch');
            data.append(field, formData);
            axios.post('/user/' + this.user.id, data, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
                .then(res => {
                    console.log(res);
                    this.message = res.data;
                    this.errors = [];
                    $('.s-msg').hide();
                    $('#' + id).css('display', 'flex');
                })
                .catch((error) => {
                    console.log(error);
                    this.errors = error.response.data.errors;
                    this.message = "";
                });
        },
        avatarPreview(event) {
            this.toggleSave('saveavatar');
            this.userForm.avatar = event.target.files[0];
            if (this.userForm.avatar) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                };

                reader.readAsDataURL(this.userForm.avatar);
            }
        }
    },
    mounted() {
    }
}
</script>