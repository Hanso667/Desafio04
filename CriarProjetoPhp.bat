
@echo off

setlocal

color a

set /p diretorio= Insira o nome: 


if exist %diretorio% (

	echo %diretorio% ja existe

) else (

	echo criando %diretorio%
	mkdir "./%diretorio%"
	mkdir "./%diretorio%/pages"
	mkdir "./%diretorio%/classes"

		echo ^<?php?^> >> ./%diretorio%/classes/classe.php

	mkdir "./%diretorio%/src"
	echo criando src
	mkdir "./%diretorio%/src/css"
	echo criando css
	mkdir "./%diretorio%/src/img"
	echo criando img
	mkdir "./%diretorio%/src/scripts"
	echo criando script
	echo criando index

		echo ^<!DOCTYPE html^> >> ./%diretorio%/index.php
		echo ^<html lang="en"^> >> ./%diretorio%/index.php
		echo ^<head^> >> ./%diretorio%/index.php
		echo     ^<link rel="stylesheet" href="src/css/reset.css"^> >> ./%diretorio%/index.php
		echo     ^<link rel="stylesheet" href="src/css/style.css"^> >> ./%diretorio%/index.php
		echo     ^<meta charset="UTF-8"^> >> ./%diretorio%/index.php
		echo     ^<meta name="viewport" content="width=device-width, initial-scale=1.0"^> >> ./%diretorio%/index.php
		echo     ^<title^>Document^</title^> >> ./%diretorio%/index.php
		echo ^</head^> >> ./%diretorio%/index.php
		echo ^<body^> >> ./%diretorio%/index.php
		echo ^</body^> >> ./%diretorio%/index.php
		echo ^</html^> >> ./%diretorio%/index.php

	echo criando style

		echo /*style*/ > ./%diretorio%/src/css/style.css
		echo criando reset						 
		echo html, body, div, span, applet, object, iframe, >> ./%diretorio%/src/css/reset.css
		echo h1, h2, h3, h4, h5, h6, p, blockquote, pre, >> ./%diretorio%/src/css/reset.css
		echo a, abbr, acronym, address, big, cite, code, >> ./%diretorio%/src/css/reset.css
		echo del, dfn, em, img, ins, kbd, q, s, samp, >> ./%diretorio%/src/css/reset.css
		echo small, strike, strong, sub, sup, tt, var, >> ./%diretorio%/src/css/reset.css
		echo b, u, i, center, >> ./%diretorio%/src/css/reset.css
		echo dl, dt, dd, ol, ul, li, >> ./%diretorio%/src/css/reset.css
		echo fieldset, form, label, legend, >> ./%diretorio%/src/css/reset.css
		echo table, caption, tbody, tfoot, thead, tr, th, td, >> ./%diretorio%/src/css/reset.css
		echo article, aside, canvas, details, embed,  >> ./%diretorio%/src/css/reset.css
		echo figure, figcaption, footer, header, hgroup, >> ./%diretorio%/src/css/reset.css
		echo menu, nav, output, ruby, section, summary, >> ./%diretorio%/src/css/reset.css
		echo time, mark, audio, video { >> ./%diretorio%/src/css/reset.css
		echo	margin: 0; >> ./%diretorio%/src/css/reset.css
		echo	padding: 0; >> ./%diretorio%/src/css/reset.css
		echo	border: 0; >> ./%diretorio%/src/css/reset.css
		echo	font-size: 100%%; >> ./%diretorio%/src/css/reset.css
		echo	font: inherit; >> ./%diretorio%/src/css/reset.css
		echo	vertical-align: baseline; >> ./%diretorio%/src/css/reset.css
		echo } >> ./%diretorio%/src/css/reset.css
		echo /* HTML5 display-role reset for older browsers */ >> ./%diretorio%/src/css/reset.css
		echo article, aside, details, figcaption, figure,  >> ./%diretorio%/src/css/reset.css
		echo footer, header, hgroup, menu, nav, section { >> ./%diretorio%/src/css/reset.css
		echo	display: block; >> ./%diretorio%/src/css/reset.css
		echo } >> ./%diretorio%/src/css/reset.css
		echo body { >> ./%diretorio%/src/css/reset.css
		echo	line-height: 1; >> ./%diretorio%/src/css/reset.css
		echo } >> ./%diretorio%/src/css/reset.css
		echo ol, ul { >> ./%diretorio%/src/css/reset.css
		echo	list-style: none; >> ./%diretorio%/src/css/reset.css
		echo } >> ./%diretorio%/src/css/reset.css
		echo blockquote, q { >> ./%diretorio%/src/css/reset.css
		echo	quotes: none; >> ./%diretorio%/src/css/reset.css
		echo } >> ./%diretorio%/src/css/reset.css
		echo blockquote:before, blockquote:after, >> ./%diretorio%/src/css/reset.css
		echo q:before, q:after { >> ./%diretorio%/src/css/reset.css
		echo 	content: ''; >> ./%diretorio%/src/css/reset.css
		echo	content: none; >> ./%diretorio%/src/css/reset.css
		echo } >> ./%diretorio%/src/css/reset.css
		echo table { >> ./%diretorio%/src/css/reset.css
		echo	border-collapse: collapse; >> ./%diretorio%/src/css/reset.css
		echo	border-spacing: 0; >> ./%diretorio%/src/css/reset.css
		echo } >> ./%diretorio%/src/css/reset.css

	echo criando scripts
	echo //Javascript > ./%diretorio%/src/scripts/script.js)

pause

	cd "./%diretorio%"
	code .

endlocal