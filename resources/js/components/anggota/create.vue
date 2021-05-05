<template>
    <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form  @submit.prevent="postMembers(member)">
                                <div class="form-group row">
                                    <label
                                        for="inputEmail3"
                                        class="col-sm-2 col-form-label"
                                        >Email</label
                                    >
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputEmail3"
                                            placeholder="Kode Anggota"
                                            v-model="member.kode_anggota"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="inputPassword3"
                                        class="col-sm-2 col-form-label"
                                        >Nama Anggota</label
                                    >
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputPassword3"
                                            placeholder="Nama Anggota"
                                            v-model="member.nama_anggota"
                                        />
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label
                                        for="inputPassword3"
                                        class="col-sm-2 col-form-label"
                                        >Jurusan</label
                                    >
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputPassword3"
                                            placeholder="Nama Jurusan"
                                            v-model="member.id_jurusan"
                                        />
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label
                                        for="inputPassword3"
                                        class="col-sm-2 col-form-label"
                                        >No Tlp</label
                                    >
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputPassword3"
                                            placeholder="Nama Jurusan"
                                            v-model="member.no_tlp_anggota"
                                        />
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label
                                        for="inputPassword3"
                                        class="col-sm-2 col-form-label"
                                        >Alamat</label
                                    >
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputPassword3"
                                            placeholder="Nama Jurusan"
                                             v-model="member.alamat_anggota"
                                        />
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend
                                            class="col-form-label col-sm-2 pt-0"
                                        >
                                            Radios
                                        </legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="gridRadios"
                                                    id="gridRadios1"
                                                    value="L"
                                                    checked
                                                    v-model="member.jk_anggota"
                                                />
                                                <label
                                                    class="form-check-label"
                                                    for="gridRadios1"
                                                >
                                                    Laki-Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="gridRadios"
                                                    id="gridRadios2"
                                                    value="P"
                                                    v-model="member.jk_anggota"
                                                />
                                                <label
                                                    class="form-check-label"
                                                    for="gridRadios2"
                                                >
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Sign in
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {
            member: {
                // id: "",
                kode_anggota: Date.now(),
                nama_anggota: "",
                jk_anggota: "",
                id_jurusan: "",
                no_tlp_anggota: "",
                alamat_anggota: ""
            }
        };
    },

    // computed: mapGetters({
    //     members: "members"
    // }),

    methods: mapActions(["postMembers"])
};
</script>
