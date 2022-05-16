@ECHO OFF

rem Maak de tijdelijke mappen aan
mkdir .\tmp
mkdir .\tmp\app
mkdir .\tmp\resources
mkdir .\tmp\routes

rem Kopieer de relevante bron-code erin
xcopy .\app .\tmp\app /E
xcopy .\resources .\tmp\resources /E
xcopy .\routes .\tmp\routes /E

rem Maak een zip van deze map
CScript  zip.vbs  .\tmp  .\controleer_hiervan_inhoud_en_lever_in_op_itslearning.zip

rem Verwijder de tijdelijke map
@RD /S /Q ".\tmp"