<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Statistique.css" />
    <meta charset="utf-8"/>
    <title>Statistique</title>
    <style>
        body{
            font-family: 'Source code pro', Calibri, serif;
            margin: 0px;
            padding:0px;    
            }

        img{
            width: 10%;
            height: auto;
            }

        nav >ul{
            margin: 0px;
            padding: 0px;
            }

        .onglet { /*enlever les puces devant les éléments*/
            list-style-type: none;
            }

        nav{
            width: 100%;/*le menu prend toute la place*/
            border-bottom: black 1px solid;
            background-color: grey;
            height: 30px;
            }

        nav> ul> li{
            float: right; /*aligner les onglets*/
            position: relative;
            }
        
        nav> ul::after{
            content:"";
            display: block;
            }

        nav a{/*enlever le soulignement des liens*/
            display: inline-block;
            text-decoration: none;
            }

        nav> ul> li> a{/*marges de chaque onglet*/
            padding: 5px 30px;
            padding-left: 10px;
            color: white;
            }
        .onglet:hover a{
            color: #e4e4e6;
            }

        .submenu{
            list-style-type: none;/*enlever les puces dans le sous menu*/
            display: none;
            margin-top: 0px;
            }

        .submenu a{/*gérer marge padding taille couleur largueur...*/
            padding: 10px 30px;
            font-size: 18px;
            color: white;
            width: 90px;
            background-color:black; 
            }

        .onglet:hover .submenu{
            display: inline-block;
            position: absolute;
            top: 100%;/*faire afficher le sous menu au bon niveau*/
            left: 0px;/*afficher le sous menu au bon endroit(vertical)*/
            padding:0px;
            z-index: 100000;
            }

        .submenu a:hover{
            background-color: #424458;/*hover pour changer la couleur des onglets du sous menu*/
            }

        .menu-espaceclient, .menu-inscription{
            border:2px solid black;
            border-radius: 20px;
            text-decoration: none;
            margin: 10px;
            margin-top: 20px;
            padding: 2px 7px;
            position:relative;
            float: right;
            color: white;
            background-color: black;
        }

        .menu-inscription:hover{
            background-color: #424558;
            border:2px solid #424558;
        }

        .menu-espaceclient:hover{
            background-color: #424558;
            border:2px solid #424558;
        }

        header{
            background-color: grey;
        }

/*responsive*/
    @media only screen and (max-width:1500px){
        .onglet a{
            margin-right: 2px;
            padding-left: 10px;
            padding-right: 10px;
            }
    
        .submenu a{
            width: 100px;
            }

        img{
            width: 13%;
            height: auto;
            }
    }

    @media only screen and (max-width:750px){
        .menu-espaceclient, .menu-inscription{
                font-size: 12px;
                margin-top: 10px;
                margin-left: 0px;
                }
    
        .onglet a{
            width: 50%;
            padding-left: 2px;
            padding-right: 2px;
            border-bottom: black solid 1px;
        }

        nav> ul> li{
            float: none;
            background-color: grey;
            text-align: center;
        }
    
        nav{

        }

        img{
            width: 25%;
            height: auto;
        }
        .submenu{
        width: 100%;
    }
}

/*le code de Statistique*/

div> ul,li{
    margin:0;
    padding:0;
    }

a{
    text-decoration: none; /*取消超链接的下划线样式*/
    color:black;
    }

.box{
    width:auto;
    height:500px;
    border:1px solid #000000;
    border-radius:10px;
    margin:40px auto;
    }

.box a:hover{
color:  #A9A9A9;
text-decoration:none;
border-bottom: 1px #000000 otted 
}
        
h3{
    text-align:center;
    }
        
div> ul{
    list-style: none;
    border-bottom:1px solid #000000;
    overflow:hidden;
}
        
div> ul> li{
    float:left;
    border:1px solid #000000;
    margin-left:-1px;
    padding:6px 30px;
    border-top-left-radius:3px;
    border-top-right-radius:3px;
    border-bottom:none;
    cursor:pointer;
    }

iframe{
    width:100%;
    height:100%;
    border:none;
    background:none;
    }
    </style>
</head>
<body>
    <header>
                <a href="General.html"><img src="logo.png" alt="logo" id="logo"class="flottant"/></a>
                <a class="menu-espaceclient" href=espaceclient.html>Espace Client</a>
                <a class="menu-inscription" href=inscription.html>Inscription</a>
                <nav>
                    <ul>
                        <li class="onglet"><a href=AproposeDNous.php>A propos de nous </a></li>
                        <li class="onglet"><a href=Expertise.html>Expertise </a></li>   
                        <li class="onglet"><a href=FAQ.html>FAQ </a></li>

                        <li class="onglet"><a href=NousContacter.html>Nous contacter</a></li>
                        <li class="onglet"><a href=Forum.html>Forum </a></li>
                        <li class="onglet"><a href="#">Menu</a>
                            <div class="submenu">
                                <a href=Accueil.html>Accueil</a>
                                <a href="Statistiques.html">Statistiques</a>
                                <a href="#">Profil</a>
                                <a href="#">Paramètres</a>
                            </div>
                        </li>
                    </ul>
                </nav>
        </header>

    <div class="box">
   
    <ul id="statistique">
        <li><a href="diagramme_temperature.php" target="content1">témperature</a></li>
        <li><a href="diagramme_humite.php" target="content1">humite</a></li>
    </ul>
    <iframe src="diagramme_temperature.php" name="content1" ></iframe>
</div>
<script>
    var lis=document.querySelectorAll("#example1 li");
    var len=lis.length;

    for(var i=0;i<len;i++){
        lis[i].onclick=function(){
            
            for(var i=0;i<len;i++){
                if(lis[i]==this){
                    lis[i].style.background="#f90";
                    lis[i].querySelector("a").style.color="white";
                }else{
                    lis[i].style.background="white";
                    lis[i].querySelector("a").style.color="black";
                }
            }
        }
    }
</script>
</body>
</html>