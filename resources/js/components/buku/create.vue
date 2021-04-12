

<template>
   <div class="container mt-3">
      <div class="row">
         <h1>Tambah Buku</h1>
      </div>
      <form @submit.prevent="createBooks">
         <p v-if="errors.length">
         <ul>
            <li v-for="error in errors" :key="error">{{ error }}</li>
         </ul>
         </p>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputEmail4">Kode Buku</label>
               <input type="text" class="form-control" id="inputEmail4" v-model="kode_buku" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
               <label for="inputPassword4">Password</label>
               <input type="text" class="form-control" id="inputPassword4" v-model="judul_buku" placeholder="Password">
            </div>
         </div>
         <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" v-model="penulis_buku" placeholder="1234 Main St">
         </div>
         <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" v-model="penerbit_buku" placeholder="Apartment, studio, or floor">
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputCity">City</label>
               <input type="text" class="form-control" v-model="tahun_penerbit" id="inputCity">
            </div>
            <div class="form-group col-md-4">
               <label for="inputState">State</label>
               <select id="inputState" class="form-control" v-model="images">
                  <option selected>Choose...</option>
                  <option>...</option>
               </select>
            </div>
            <div class="form-group col-md-2">
               <label for="inputZip">Zip</label>
               <input type="text" class="form-control" v-model="desc_buku" id="inputZip">
            </div>
         </div>
         <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" v-model="nama_rak" placeholder="Apartment, studio, or floor">
         </div>
         <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" v-model="lokasi_rak" placeholder="Apartment, studio, or floor">
         </div>
         <!-- show image convert -->
         <!-- <img v-bind:src="'data:image/jpeg;base64,'" /> -->
         <div class="form-row">
            <UploadImages :max="1" @change="handleImages"/>
         </div>
         <input type="submit" value="Submit">
      </form>
   </div>
</template>
<script>
   import UploadImages from "vue-upload-drop-images"
   export default {
     data() {
         return {
             errors: [],
             kode_buku: "",
             judul_buku: "",
             penulis_buku: "",
             penerbit_buku: "",
             tahun_penerbit: "",
             images: null,
             desc_buku: "",
             nama_rak: "",
             lokasi_rak: "",
         }
     },
     components: {
                      UploadImages,
                  },
     mounted() {

     },

     methods: {

         createBooks: function(e) {
             console.log(this.kode_buku , this.images);
             if(this.kode_buku && this.judul_buku && this.penulis_buku && this.penerbit_buku && this.tahun_penerbit
                 && this.images && this.desc_buku && this.nama_rak && this.lokasi_rak) {

             }

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
                 console.log(files)
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
             }

     }
   }
</script>

