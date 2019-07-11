//トップページ
<template>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  
  <main role="main" class="inner cover">
    <h1 class="cover-heading">Chemical Activity Search </h1>
    
    //ログインネーム表示
    <p>ようこそ{{user.name}}さん</p>
    
    //登録最新化合物の表示（将来的には各分野毎に表示）
    <p class="lead">最新登録化合物</p>
    <ul>
    <li class="lead">Latest No. : {{latestNo}}</li>
    </ul>
       <a href="/search" class="btn btn-secondary my-1">Start</a>
  </main>

  <footer class="">
    <div class="">
    <p>copyright 2019 Kentaro Arai</p>
    <p> Please send e-mail if you have a suggestion how to improve the program.</p>
    <a href='#'> e-mail</a>

    </div>
  </footer>
</div>

</template>

<script>
export default{
  name: 'Top',
  props:['user'],
  data(){
  return{
  latestNo:''
  }
  },
  mounted(){
    axios.get('/api/compounds')
    .then((res)=>{this.latestNo = res.data.data.reduce((a, b) => a > b.id ? a : b.compound_name, 0);

    });

  }
  }
  
  

  


</script>