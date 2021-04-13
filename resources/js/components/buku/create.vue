

<template>
   <div class="container mt-3">
      <div class="row">
         <h1>Tambah Buku</h1>
      </div>
      <form @submit.prevent="createBooks" method="post" enctype="multipart/form-data">
         <p v-if="errors.length">
         <ul>
            <li v-for="error in errors" :key="error">{{ error }}</li>
         </ul>
         </p>
         <div class="form-row">
             <img v-bind:src="`${images}`" />
           <input type="file" class="form-control" id="customFile"
                        ref="file" @change="handleFileObject()">     {{ imagesName }}    </div>
         <div class="form-row mt-2">
            <div class="form-group col-md-6">
               <label for="inputEmail4">Kode Buku</label>
               <input type="text" class="form-control" id="inputEmail4" v-model="formData.kode_buku" value="kode_buku" readonly placeholder="Email">
            </div>
            <div class="form-group col-md-6">
               <label for="inputPassword4">Judul Buku</label>
               <input type="text" class="form-control" id="inputPassword4" v-model="formData.judul_buku" placeholder="Judul Buku">
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Penulis Buku</label>
                <input type="text" class="form-control" id="inputAddress" v-model="formData.penulis_buku" placeholder="Penulis Buku">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Penerbit Buku</label>
                <input type="text" class="form-control" id="inputAddress2" v-model="formData.penerbit_buku" placeholder="Penerbit Buku">
            </div>
         </div>

         <div class="form-row">
            <div class="form-group col-md-6">
               <label >Tahun Penerbit</label>
               <input type="number" class="form-control" v-model="formData.tahun_penerbit" placeholder="Tahun Penerbit">
            </div>
            <div class="form-group col-md-6">
               <label for="inputZip">Desc Buku</label>
               <textarea type="text" class="form-control" rows="2" v-model="formData.desc_buku" id="inputZip"></textarea>
            </div>
         </div>
          <div class="form-row">
             <div class="form-group col-md-6">
            <label for="inputAddress2">Rak Buku</label>
            <input type="text" class="form-control" id="inputAddress2" v-model="formData.nama_rak" placeholder="Rak Buku">
         </div>
         <div class="form-group col-md-3">
            <label for="inputAddress2">Lokasi Buku</label>
            <input type="text" class="form-control" id="inputAddress2" v-model="formData.lokasi_rak" placeholder="Lokasi Rak Buku">
         </div>
          <div class="form-group col-md-3">
            <label for="inputAddress2">Stock Buku</label>
            <input type="text" class="form-control" id="inputAddress2" v-model="formData.stock" placeholder="Stock Buku">
         </div>
         </div>

         <input type="submit" class="btn btn-sm btn-success" value="Submit">
      </form>
        </div>
</template>
<script>
   import UploadImages from "vue-upload-drop-images"
   import vue2Dropzone from 'vue2-dropzone'
   import 'vue2-dropzone/dist/vue2Dropzone.min.css'
   export default {
     data() {
         return {
             errors: [],
             formData: {
                kode_buku: "",
                judul_buku: "",
                penulis_buku: "",
                penerbit_buku: "",
                tahun_penerbit: "",
                 desc_buku: "",
                nama_rak: "",
                lokasi_rak: "",
                stock: 0,
             },

             images: null,
             imagesName: null,
             timestamp: ""
         }
     },
     components: {
                      UploadImages,
                      vueDropzone: vue2Dropzone

                  },
     mounted() {
            this.formData.kode_buku = Date.now()
     },

     methods: {

         createBooks: function(e) {
            // console.log()

            //  if(this.kode_buku && this.judul_buku && this.penulis_buku && this.penerbit_buku && this.tahun_penerbit
            //      && this.images && this.desc_buku && this.nama_rak && this.lokasi_rak) {
//   if(this.kode_buku ) {
      let formData = new FormData()

       formData.append('images', this.images)

        _.each(this.formData, (value, key) => {
          formData.append(key, value)
        })

                let uri = this.$baseUrl + `buku/store`;
            //     console.log(uri)
            //      const data = {
            //      'kode_buku' : this.kode_buku,
            //      'judul_buku' : this.judul_buku,
            //      'penulis_buku' : this.penulis_buku,
            //      'penerbit_buku' : this.penerbit_buku,
            //      'tahun_penerbit' : this.tahun_penerbit,
            //     //  'file' : this.images,
            //      'desc'  : this.desc_buku,
            //      'nama_rak' : this.nama_rak,
            //      'lokasi_rak' : this.lokasi_rak,
            //      'stock' : this.stock
            //  }

                this.axios.post(uri, formData, {
             headers: {
                  'Content-Type': 'multipart/form-data'
                }
          }).then((result) => {
                    console.log(result);
                    // this.$router.push({name: 'book'})
                }).catch((err) => {
                   if (err.response.status === 422) {
                    this.errors = []
                    _.each(err.response.data.errors, error => {
                    _.each(error, e => {
                        this.errors.push(e)
                    })
            })

          }
                })
            //  }

             this.errors = [];

             if (!this.kode_buku) {
                  this.errors.push('Name required.');
             }
             if (!this.judul_buku) {
                  this.errors.push('Judul Buku required.');
             }

             if (!this.penulis_buku) {
                  this.errors.push('penulis_buku Buku required.');
             }

             if (!this.penerbit_buku) {
                  this.errors.push('penerbit_buku Buku required.');
             }

             if (!this.tahun_penerbit) {
                  this.errors.push('tahun_penerbit Buku required.');
             }

             if (!this.images) {
                  this.errors.push('images Buku required.');
             }

             if (!this.nama_rak) {
                  this.errors.push('nama_rak Buku required.');
             }

             if (!this.lokasi_rak) {
                  this.errors.push('lokasi_rak Buku required.');
             }

             e.preventDefault();
         },
            handleImages(files){
                this.images = files;
                 this.imagesName = this.images.name
                /*
                [
                    {
                        "name": "Screenshot from 2021-02-23 12-36-33.png",
                        "size": 319775,
                        "type": "image/png",
                        "lastModified": 1614080193596
                        ...
                    },
                    ...
                    ]
                */
            },

             handleFileObject() {
                this.images = this.$refs.file.files[0]
                this.imagesName = this.images.name
      }
     },
   }
</script>

<style>
.dropzone-custom-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.dropzone-custom-title {
  margin-top: 0;
  color: #00b782;
}

.subtitle {
  color: #314b5f;
}
</style>
