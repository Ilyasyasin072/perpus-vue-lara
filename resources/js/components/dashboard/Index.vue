

<template>
   <div>
      <div class="container mt-5">
         <div class="row">
            <div class="col-sm col-md col-sm">
               <div class="search-wrapper">
                  <form>
                     <label for="">Search Books</label>
                     <input
                        type="text"
                        class="form-control"
                        placeholder="Cari Buku"
                        v-model="search"
                        />
                  </form>
               </div>
               <div class="panel-default">
                  <div class="row">
                     <div
                        class="col-md-3"
                        v-for="(books, index) in filterBooks"
                        :key="books.id"
                        >
                        <div class="card mt-3">
                           <div class="card-header">
                              <label for="">{{
                              books.judul_buku
                              }}</label>
                           </div>
                           <div class="card-body">
                              <div v-if="`${books.img}`">
                                  <img
                                 class="card-img-top img-fluid"
                                 :src="`/books/${books.img}`"
                                 />
                              </div>
                              <div v-else>
                                  <img
                                 class="card-img-top img-fluid"
                                 :src="`http://www.kulinerindonesia.id/assets/img/default_image.jpg`"
                                 />
                              </div>
                              <legend class="mt-2">
                                 <fieldset>
                                    <p>
                                       {{ books.judul_buku }}&nbsp;-{{
                                       index + 1
                                       }}
                                    </p>
                                 </fieldset>
                              </legend>
                              <div class="btn-content mt-2">
                                 <button class="btn btn-warning btn-sm w-100"  @click="showById(books.id)">
                                 Detail
                                 </button>
                                 <button class="btn btn-sm w-100 ml-2 text-light" style="background-color: #2b2d42">
                                 Pinjam Buku
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
   export default {
       data() {
           return {
               books: [],
               search: "",
               img: ""
           };
       },
       computed: {
           filterBooks: function() {
               var self = this;
               return this.books.filter(book => {
                   console.log(book.judul_buku);
                   // return book.judul_buku.includes(this.search);
                   return (
                       book.judul_buku.indexOf(self.search) >= 0 ||
                       book.penerbit_buku.indexOf(self.search) >= 0
                   );
               });
           }
       },
       created() {
           let uri = this.$baseUrl + "buku";
           this.axios.get(uri).then(response => {
               this.books = response.data.result;
           });
       },
       methods: {
           showById: function(id) {
               console.log(id);
               this.$router.push({ name: "books.show", params: { id } });
           }
       }
   };
</script>

