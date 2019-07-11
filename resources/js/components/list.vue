//検索結果一覧表示
 <template>
 <main role="main">
    <div class="container">
        <h1 class="jumbotron-heading">Structure List</h1>
    <div class="row">
    <div class="col-md-12 mx-auto">
    
    <router-link v-for="( compound, key, index ) in compounds" :key="key" :to="{name:'detail',params:{id:compounds.id}}" class="list-group-item">
    {{compound}}
    <div code="JME.class" archive="JME.jar" width=250
                    height=200>
    <param name="options" value="depict">
    <param name="mol" value="jme"> 
    </div>


   //パラメータ 
        <table class="table">
        <thead>
            <tr>
            <th width="30%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th>化合物名</th>
            <td>{{compound.compound_name}}</td>
            </tr> 
            <tr>
            <th>合成者</th>
            <td>{{compound.author}}</td>
            </tr> 
            <tr>
            <th>登録日</th>
            <td>{{compound.date}}</td>
            </tr>   
        </tbody>    
        </table>

        </router-link>


  </div>
  </div>
  </div>
</main>
</template>

<script>
export default {
  name: 'List',
  props:[],
  data() {
    return {
      compounds:[
      {id:'',compound_name:'',structure:'',author:'',date:''}
      ]
    }
  },
  mounted(){
    this.$nextTick(()=>{this.getItem();});
  },
  methods:{
  getItem() {
            axios.get('/api/compounds/')
            .then( ( res ) => {
                this.compounds = res.data.data;
            });

        },
  jsme(compound){
    document.getElementByName('mol').value = this.compound.structure;

    


  }     
  }
}
</script>