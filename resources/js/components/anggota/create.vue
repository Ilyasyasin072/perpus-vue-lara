<template>
  <div class="container-fluid mt-5">
        <form @submit.prevent="postMembers(member)">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <input
                            type="text"
                            v-model="member.kode_anggota"
                        />
                        &nbsp;Kode Anggota
                    </div>
                     <div class="panel-body">
                        <input
                            type="text"
                            v-model="member.nama_anggota"
                        />
                        &nbsp;Nama Anggota
                    </div>
                     <div class="panel-body">
                        <input
                            type="text"
                            v-model="member.jk_anggota"
                        />
                        &nbsp;Jenis Kelamin Anggota
                    </div>
                     <div class="panel-body">
                        <input
                            type="text"
                            v-model="member.id_jurusan"
                        />
                        &nbsp;Jurusan Anggota
                    </div>
                     <div class="panel-body">
                        <input
                            type="text"
                            v-model="member.no_tlp_anggota"
                        />
                        &nbsp;No Tlp Anggota
                    </div>
                     <div class="panel-body">
                        <input
                            type="text"
                            v-model="member.alamat_anggota"
                        />
                        &nbsp;Alamat Anggota
                    </div>
                </div>
            </div>
        </div>
         <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-lg btn-success">
                    Submit
                  </button>
                </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {
            member: {
                // id: "",
                kode_anggota: "",
                nama_anggota: "",
                jk_anggota: "",
                id_jurusan: "",
                no_tlp_anggota: "",
                alamat_anggota: ""
            }
        };
    },

    computed: mapGetters({
        members: "members"
    }),

    methods: mapActions(["postMembers"])
};
</script>
