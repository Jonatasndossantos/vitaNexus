<x-app-layout>

    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <main class="py-5">

        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/imagem3.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                    <h2 class="fw-normal">Alimentação</h2>
                    <p>"Cuide do seu corpo com o que ele precisa, e ele cuidará de você em retorno.</p>
                    <p><a class="btn btn-outline-success" href="#alimento">Veja mais &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/imagem1.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                    <h2 class="fw-normal">Exercícios</h2>
                    <p>Cada exercício é um investimento no seu bem-estar e no futuro do seu corpo.</p>
                    <p><a class="btn btn-outline-success" href="#exer">Veja mais &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/imagem2.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                    <h2 class="fw-normal">Saúde Mental</h2>
                    <p>Cuide da sua mente com a mesma dedicação que cuida do seu corpo; ela é a base de tudo.</p>
                    <p><a class="btn btn-outline-success" href="#mental">Veja mais &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->




            <!-- START THE FEATURETTES -->
            <br>
            <h1 id="alimento" class="text-success">Alimentação</h1>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h4 class="featurette-heading fw-normal lh-1">1. Priorize alimentos naturais e integrais: </h4>
                    <p class="lead">
                        Evite alimentos processados e industrializados, que costumam ter altos níveis de açúcar,
                        sódio e gorduras ruins. Prefira frutas, vegetais, grãos integrais, proteínas magras (como
                        peixes, frango e leguminosas) e oleaginosas, que são ricos em nutrientes essenciais para o
                        corpo.
                    </p>
                    <h4 class="featurette-heading fw-normal lh-1">2. Equilibre os macronutrientes: </h4>
                    <p class="lead">
                        Tenha uma alimentação equilibrada, com uma boa distribuição entre carboidratos, proteínas e
                        gorduras saudáveis. Inclua carboidratos complexos (como batata-doce, quinoa e aveia), fontes
                        de proteínas magras (como frango, peixe e tofu) e gorduras boas (como abacate, azeite de
                        oliva e castanhas).
                    </p>
                    <h4 class="featurette-heading fw-normal lh-1">3. Hidrate-se bem: </h4>
                    <p class="lead">
                        A água é essencial para o bom funcionamento do corpo. Tente beber pelo menos 2 litros de
                        água por dia, ajustando conforme a sua atividade física e necessidades individuais. Evite
                        refrigerantes e bebidas açucaradas, que podem aumentar a ingestão calórica sem fornecer
                        nutrientes importantes.
                    </p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/imagem3.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h4 class="featurette-heading fw-normal lh-1">Smoothie de Frutas </h4>
                    <p class="lead">Ingredientes: <br>
                        1 banana congelada <br>
                        1/2 xícara de morangos congelados (ou outra fruta do seu gosto) <br>
                        1 colher de sopa de chia ou linhaça <br>
                        1/2 xícara de leite de amêndoas (ou outro leite vegetal) <br>
                        Gelo a gosto <br><br>
                        Modo de preparo: <br>

                        Coloque todos os ingredientes no liquidificador. <br>
                        Bata até obter uma mistura homogênea. <br>
                        Se preferir mais líquido, adicione um pouco mais de leite de amêndoas. <br>
                        Sirva imediatamente.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/morango.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h4 class="featurette-heading fw-normal lh-1">Frango Grelhado com Abacate e Molho de Iogurte
                    </h4>
                    <p class="lead">Ingredientes: <br>

                        2 filés de peito de frango <br>
                        1 abacate maduro <br>
                        1 pote de iogurte natural sem açúcar <br>
                        1 colher de chá de mostarda <br>
                        1 colher de chá de mel <br>
                        Suco de 1 limão <br>
                        Sal e pimenta a gosto <br> <br>
                        Modo de preparo: <br>

                        Tempere os filés de frango com sal, pimenta e suco de limão. Grelhe em uma frigideira até
                        ficarem dourados e cozidos por dentro. <br>
                        Para o molho: misture o iogurte, mostarda, mel, suco de limão, sal e pimenta em uma tigela.
                        <br>
                        Corte o abacate em fatias e coloque sobre o frango grelhado. <br>
                        Sirva com o molho de iogurte por cima.
                    </p>
                </div>
                <div class="col-md-5 ">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/frango.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->


            <!-- START THE FEATURETTES -->
            <br>
            <h1 id="exer" class="text-success">Exercícios</h1>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h4 class="featurette-heading fw-normal lh-1">1. Escute o seu corpo e durma bem: </h4>
                    <p class="lead">
                        O sono é fundamental para a recuperação física e mental. Tente dormir de 7 a 8 horas por
                        noite, criando uma rotina que permita ao seu corpo descansar de forma eficaz. Evite
                        distrações como telas de celular ou computador antes de dormir, e crie um ambiente tranquilo
                        para garantir um sono de qualidade.
                    </p> <br>
                    <h4 class="featurette-heading fw-normal lh-1">2. Pratique atividade física regularmente: </h4>
                    <p class="lead">
                        A prática de exercícios físicos, seja caminhada, corrida, yoga ou musculação, é essencial
                        para a saúde do coração, músculos e articulações. Além disso, ajuda a liberar endorfina, o
                        que melhora o humor e reduz o estresse. Tente incluir pelo menos 30 minutos de atividade
                        física no seu dia.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/exercicio.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h4 class="featurette-heading fw-normal lh-1">1. Agachamento (Squat)</h4>
                    <p class="lead">
                        Por que é bom: O agachamento é um excelente exercício para fortalecer as pernas, glúteos e o
                        core. Ele trabalha vários músculos ao mesmo tempo e melhora a estabilidade e a postura. <br>

                        Como fazer: Fique de pé com os pés alinhados com os ombros. Dobre os joelhos e leve os
                        quadris para trás, como se fosse se sentar em uma cadeira. Mantenha as costas retas e o
                        peito aberto. Desça até os quadris ficarem paralelos ao chão e depois volte à posição
                        inicial. <br>
                        Dica: Evite que os joelhos ultrapassem a linha dos pés.
                    <h4 class="featurette-heading fw-normal lh-1">2. Prancha (Plank)</h4>
                    <p class="lead">
                        Por que é bom: A prancha é um dos melhores exercícios para fortalecer o core (músculos
                        abdominais, lombares e laterais), além de melhorar a postura e a resistência. <br>

                        Como fazer: Deite de barriga para baixo e apoie-se nos antebraços e nas pontas dos pés.
                        Levante o corpo mantendo-o alinhado da cabeça aos pés, contraindo o abdômen. Fique nessa
                        posição pelo máximo de tempo que conseguir. <br>
                        Dica: Não deixe o quadril cair para o chão. Mantenha o corpo reto. </p>

                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/prancha.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h4 class="featurette-heading fw-normal lh-1">1. Melhora a Saúde Cardiovascular: </h4>
                    <p class="lead">
                        A prática regular de exercícios, como caminhada, corrida, natação ou ciclismo, ajuda a
                        fortalecer o coração e melhorar a circulação sanguínea. Isso reduz o risco de doenças
                        cardíacas, hipertensão e melhora a resistência física geral. A atividade física também ajuda
                        a controlar os níveis de colesterol e a pressão arterial, promovendo uma vida mais saudável
                        e duradoura. </p>
                    <h4 class="featurette-heading fw-normal lh-1">2. Fortalece os Músculos e Ossos: </h4>
                    <p class="lead">
                        Exercícios de resistência, como musculação, agachamentos e flexões, ajudam a aumentar a
                        força muscular e a densidade óssea. Com o tempo, isso previne a osteoporose e a perda
                        muscular, além de melhorar a postura e o equilíbrio. Um corpo mais forte e flexível também
                        reduz o risco de lesões e ajuda na realização das atividades diárias com mais facilidade.
                    </p>
                    <h4 class="featurette-heading fw-normal lh-1">3. Benefícios para a Saúde Mental:</h4>
                    <p class="lead">

                        A atividade física não só traz benefícios para o corpo, mas também para a mente. O exercício
                        libera endorfinas, substâncias químicas que melhoram o humor e ajudam a reduzir o estresse,
                        a ansiedade e a depressão. A prática regular de exercícios também melhora a qualidade do
                        sono e aumenta a sensação geral de bem-estar e felicidade.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/imagem1.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->


            <!-- START THE FEATURETTES -->
            <br>
            <h1 id="mental" class="text-success">Saúde Mental</h1>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h4 class="featurette-heading fw-normal lh-1">1. Pratique a Autocompaixão: </h4>
                    <p class="lead">
                        Seja gentil com você mesmo. Em momentos de estresse ou dificuldades, evite a autocrítica
                        excessiva. Lembre-se de que todos enfrentam desafios e que erros fazem parte do processo de
                        crescimento. Praticar a autocompaixão significa se tratar com o mesmo cuidado e compreensão
                        que você ofereceria a um amigo. </p>
                    <h4 class="featurette-heading fw-normal lh-1">
                        2. Encontre Tempo para Relaxar e Desconectar: </h4>
                    <p class="lead">

                        A vida agitada pode sobrecarregar a mente. É importante reservar momentos para relaxar e
                        desacelerar. Isso pode ser feito por meio de atividades como meditação, yoga, ou até mesmo
                        passeios ao ar livre. Desconectar-se das redes sociais e de telas também é essencial para
                        dar um descanso à mente. </p>
                    <h4 class="featurette-heading fw-normal lh-1">3. Estabeleça Conexões Sociais Positivas: </h4>
                    <p class="lead">

                        Ter um círculo de apoio é fundamental para a saúde mental. Manter contato com amigos,
                        familiares e pessoas que você confia pode proporcionar conforto emocional, além de melhorar
                        a sensação de pertencimento e segurança. Se necessário, não hesite em buscar ajuda
                        profissional, como terapia, para lidar com emoções mais profundas.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/paixao.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h4 class="featurette-heading fw-normal lh-1">1. A Saúde Mental Impacta o Bem-Estar Geral: </h4>
                    <p class="lead">
                        A saúde mental não afeta apenas o estado emocional, mas também o físico. Quando estamos
                        mentalmente saudáveis, temos mais energia, concentração e motivação para realizar tarefas
                        diárias. Ela também influencia a nossa qualidade de vida, relacionamentos e capacidade de
                        lidar com desafios. </p>
                    <h4 class="featurette-heading fw-normal lh-1">2. É Normal Passar por Momentos Difíceis: </h4>
                    <p class="lead">

                        Todos enfrentam momentos de estresse, ansiedade, tristeza ou preocupação. A saúde mental é
                        algo que pode ser trabalhado ao longo da vida, e buscar ajuda quando necessário é um passo
                        importante para cuidar de si mesmo. Falar sobre suas emoções, seja com amigos, familiares ou
                        profissionais, pode fazer uma grande diferença.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/felicidade.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h4 class="featurette-heading fw-normal lh-1">1. Reconhecer Sinais de Estresse ou Sobrecarga
                        Emocional: </h4>
                    <p class="lead">
                        É fundamental estar atento aos sinais de que a saúde mental está sendo sobrecarregada, como
                        fadiga constante, dificuldade para dormir, irritabilidade ou perda de interesse nas coisas.
                        Quando perceber esses sinais, é importante agir e buscar apoio, seja conversando com alguém
                        de confiança ou procurando ajuda profissional. </p>
                    <h4 class="featurette-heading fw-normal lh-1">2. Evitar o Isolamento Social:</h4>
                    <p class="lead">

                        O isolamento pode agravar questões de saúde mental. Manter conexões sociais saudáveis, seja
                        com amigos, familiares ou grupos de apoio, é essencial. Mesmo nos momentos difíceis, a
                        interação social e o compartilhamento de emoções ajudam a aliviar o peso da ansiedade e da
                        solidão. </p>
                    <h4 class="featurette-heading fw-normal lh-1">3. Não Ignorar a Necessidade de Profissionais de
                        Saúde Mental: </h4>
                    <p class="lead">

                        Não há problema em pedir ajuda quando necessário. Terapias, consultas com psicólogos ou
                        psiquiatras podem ser essenciais para lidar com questões mais complexas. Buscar tratamento é
                        um sinal de força, e profissionais capacitados podem oferecer estratégias para lidar com as
                        dificuldades emocionais de forma eficaz.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="{{ url ('/assets/imagem/depressao.jpg')}}" width="500" height="500" alt=""
                        style="border-radius:20px;">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <a href="#"><p class="float-end text-success">Voltar ao topo</p></a>
            <p>&copy; 2025 VitaNexus &middot; </p>
        </footer>
    </main>

</x-app-layout>