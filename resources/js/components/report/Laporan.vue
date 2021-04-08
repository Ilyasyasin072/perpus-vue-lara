<template>
    <div>
        <vue-html2pdf
            :show-layout="false"
            :float-layout="true"
            :enable-download="true"
            :preview-modal="true"
            :paginate-elements-by-height="1400"
            filename="hee hee"
            :pdf-quality="2"
            :manual-pagination="false"
            pdf-format="a4"
            pdf-orientation="landscape"
            pdf-content-width="800px"
            @beforeDownload="beforeDownload($event)"
            @hasStartedGeneration="hasStartedGeneration()"
            @hasGenerated="hasGenerated($event)"
            ref="html2Pdf"
        >
            <section slot="pdf-content">
                <!-- PDF Content Here -->
                <div class="hello">
                    <h1>{{ msg }}</h1>
                    <h2>Essential Links</h2>
                    <ul>
                        <li>
                            <a href="https://vuejs.org" target="_blank"
                                >Core Docs</a
                            >
                        </li>
                        <li>
                            <a href="https://forum.vuejs.org" target="_blank"
                                >Forum</a
                            >
                        </li>
                        <li>
                            <a
                                href="https://gitter.im/vuejs/vue"
                                target="_blank"
                                >Gitter Chat</a
                            >
                        </li>
                        <li>
                            <a href="https://twitter.com/vuejs" target="_blank"
                                >Twitter</a
                            >
                        </li>
                        <br />
                        <li>
                            <a
                                href="http://vuejs-templates.github.io/webpack/"
                                target="_blank"
                                >Docs for This Template</a
                            >
                        </li>
                    </ul>
                    <h2>Ecosystem</h2>
                    <ul>
                        <li>
                            <a href="http://router.vuejs.org/" target="_blank"
                                >vue-router</a
                            >
                        </li>
                        <li>
                            <a href="http://vuex.vuejs.org/" target="_blank"
                                >vuex</a
                            >
                        </li>
                        <li>
                            <a
                                href="http://vue-loader.vuejs.org/"
                                target="_blank"
                                >vue-loader</a
                            >
                        </li>
                        <li>
                            <a
                                href="https://github.com/vuejs/awesome-vue"
                                target="_blank"
                                >awesome-vue</a
                            >
                        </li>
                    </ul>
                </div>
            </section>
        </vue-html2pdf>
        <button @click="generateReport" class="btn btn-sm btn-primary">Export to PDF</button>
    </div>
</template>

<script>
import VueHtml2pdf from "vue-html2pdf";
export default {
    name: "hello",
    data() {
        return {
            msg: "Welcome to Your Vue.js App"
        };
    },

    methods: {
        /*
            Generate Report using refs and calling the
            refs function generatePdf()
        */
        generateReport() {
            this.$refs.html2Pdf.generatePdf();
        },
        async beforeDownload ({ html2pdf, options, pdfContent }) {
            await html2pdf().set(options).from(pdfContent).toPdf().get('pdf').then((pdf) => {
                const totalPages = pdf.internal.getNumberOfPages()
                for (let i = 1; i <= totalPages; i++) {
                    pdf.setPage(i)
                    pdf.setFontSize(10)
                    pdf.setTextColor(150)
                    pdf.text('Page ' + i + ' of ' + totalPages, (pdf.internal.pageSize.getWidth() * 0.88), (pdf.internal.pageSize.getHeight() - 0.3))
                }
            }).save()
        }
    },
    components: {
        VueHtml2pdf
    }
};
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1,
h2 {
    font-weight: normal;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: inline-block;
    margin: 0 10px;
}

a {
    color: #7db099;
}
</style>
