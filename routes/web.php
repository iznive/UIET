<?php

Route:: get('/','Controller_Login@pfLogin');
Route:: get('/Logout','Controller_Login@pfLogout');

Route:: post('/Login','Controller_Login@pfLoginEntrar');

Route:: get('/Principal','Controller_SIAAUIET@pfPrincipal');
Route:: post('/Bitacora','Controller_SIAAUIET@pfBitacora');

Route:: post('/SeEntidad','Controller_SIAAUIET@pfSeEntidad');
Route:: post('/SeMunicipio','Controller_SIAAUIET@pfSeMunicipio');
Route:: post('/SeLocalidad','Controller_SIAAUIET@pfSeLocalidad');

Route:: post('/SeEntidad2','Controller_SIAAUIET@pfSeEntidad2');
Route:: post('/SeMunicipio2','Controller_SIAAUIET@pfSeMunicipio2');
Route:: post('/SeLocalidad2','Controller_SIAAUIET@pfSeLocalidad2');



Route:: get('/Personal','Controller_Personal@pfPersonal');
Route:: post('/PersonalGuardar','Controller_Personal@fpPersonalGuardar');
Route:: post('/PersonalConsultar','Controller_Personal@fpPersonalConsultar');
Route:: post('/PersonalEliminar','Controller_Personal@fpPersonalEliminar');
Route:: get('/Personal_EditarForm/{pPK_Personal}',array('as' => 'pPK_Personal', 'uses' => 'Controller_Personal@pfPersonal_EditarForm'));
Route:: get('/Personal_ConsultarForm/{pPK_Personal}',array('as' => 'pPK_Personal', 'uses' => 'Controller_Personal@pfPersonal_ConsultarForm'));

Route:: get('/Personal_Alta_A','Controller_Personal@pfPersonal_Alta_A');
Route::get('/Personal_Alta_B/{pPK_Personal}',array('as' => 'pPK_Personal', 'uses' => 'Controller_Personal@pfPersonal_Alta_B'));

Route:: post('/Personal_FormacionBasicaGuardar','Controller_Personal@fpPersonal_FormacionBasicaGuardar');
Route:: post('/Personal_FormacionBasicaConsultar','Controller_Personal@fpPersonal_FormacionBasicaConsultar');
Route:: post('/Personal_FormacionBasicaEliminar','Controller_Personal@pfPersonal_FormacionBasicaEliminar');
Route:: post('/Personal_FormacionBasicaEditarForm','Controller_Personal@pfPersonal_FormacionBasicaEditarForm');

Route:: post('/Personal_FormacionProfesionalGuardar','Controller_Personal@fpPersonal_FormacionProfesionalGuardar');
Route:: post('/Personal_FormacionProfesionalConsultar','Controller_Personal@fpPersonal_FormacionProfesionalConsultar');
Route:: post('/Personal_FormacionProfesionalEliminar','Controller_Personal@pfPersonal_FormacionProfesionalEliminar');
Route:: post('/Personal_FormacionProfesionalEditarForm','Controller_Personal@pfPersonal_FormacionProfesionalEditarForm');

Route:: post('/Personal_FormacionPostgradosGuardar','Controller_Personal@fpPersonal_FormacionPostgradosGuardar');
Route:: post('/Personal_FormacionPostgradosConsultar','Controller_Personal@fpPersonal_FormacionPostgradosConsultar');
Route:: post('/Personal_FormacionPostgradosEliminar','Controller_Personal@pfPersonal_FormacionPostgradosEliminar');
Route:: post('/Personal_FormacionPostgradosEditarForm','Controller_Personal@pfPersonal_FormacionPostgradosEditarForm');

Route:: post('/Personal_TesisGuardar','Controller_Personal@fpPersonal_TesisGuardar');
Route:: post('/Personal_TesisConsultar','Controller_Personal@fpPersonal_TesisConsultar');
Route:: post('/Personal_TesisEliminar','Controller_Personal@pfPersonal_TesisEliminar');
Route:: post('/Personal_TesisEditarForm','Controller_Personal@pfPersonal_TesisEditarForm');

Route:: post('/Personal_FormacionComplementariaGuardar','Controller_Personal@fpPersonal_FormacionComplementariaGuardar');
Route:: post('/Personal_FormacionComplementariaConsultar','Controller_Personal@fpPersonal_FormacionComplementariaConsultar');
Route:: post('/Personal_FormacionComplementariaEliminar','Controller_Personal@pfPersonal_FormacionComplementariaEliminar');
Route:: post('/Personal_FormacionComplementariaEditarForm','Controller_Personal@pfPersonal_FormacionComplementariaEditarForm');

Route:: post('/Personal_LenguaGuardar','Controller_Personal@fpPersonal_LenguaGuardar');
Route:: post('/Personal_LenguaConsultar','Controller_Personal@fpPersonal_LenguaConsultar');
Route:: post('/Personal_LenguaEliminar','Controller_Personal@pfPersonal_LenguaEliminar');
Route:: post('/Personal_LenguaEditarForm','Controller_Personal@pfPersonal_LenguaEditarForm');

Route:: post('/Personal_ConocimientoComputoGuardar','Controller_Personal@fpPersonal_ConocimientoComputoGuardar');
Route:: post('/Personal_ConocimientoComputoConsultar','Controller_Personal@fpPersonal_ConocimientoComputoConsultar');
Route:: post('/Personal_ConocimientoComputoEliminar','Controller_Personal@pfPersonal_ConocimientoComputoEliminar');
Route:: post('/Personal_ConocimientoComputoEditarForm','Controller_Personal@pfPersonal_ConocimientoComputoEditarForm');

Route:: post('/Personal_ActualizacionGuardar','Controller_Personal@fpPersonal_ActualizacionGuardar');
Route:: post('/Personal_ActualizacionConsultar','Controller_Personal@fpPersonal_ActualizacionConsultar');
Route:: post('/Personal_ActualizacionEliminar','Controller_Personal@pfPersonal_ActualizacionEliminar');
Route:: post('/Personal_ActualizacionEditarForm','Controller_Personal@pfPersonal_ActualizacionEditarForm');

Route:: post('/Personal_AsesoriaTesisGuardar','Controller_Personal@fpPersonal_AsesoriaTesisGuardar');
Route:: post('/Personal_AsesoriaTesisConsultar','Controller_Personal@fpPersonal_AsesoriaTesisConsultar');
Route:: post('/Personal_AsesoriaTesisEliminar','Controller_Personal@pfPersonal_AsesoriaTesisEliminar');
Route:: post('/Personal_AsesoriaTesisEditarForm','Controller_Personal@pfPersonal_AsesoriaTesisEditarForm');

Route:: post('/Personal_ExperienciaProfesionalGuardar','Controller_Personal@fpPersonal_ExperienciaProfesionalGuardar');
Route:: post('/Personal_ExperienciaProfesionalConsultar','Controller_Personal@fpPersonal_ExperienciaProfesionalConsultar');
Route:: post('/Personal_ExperienciaProfesionalEliminar','Controller_Personal@pfPersonal_ExperienciaProfesionalEliminar');
Route:: post('/Personal_ExperienciaProfesionalEditarForm','Controller_Personal@pfPersonal_ExperienciaProfesionalEditarForm');

Route:: post('/Personal_ExperienciaDocenteGuardar','Controller_Personal@fpPersonal_ExperienciaDocenteGuardar');
Route:: post('/Personal_ExperienciaDocenteConsultar','Controller_Personal@fpPersonal_ExperienciaDocenteConsultar');
Route:: post('/Personal_ExperienciaDocenteEliminar','Controller_Personal@pfPersonal_ExperienciaDocenteEliminar');
Route:: post('/Personal_ExperienciaDocenteEditarForm','Controller_Personal@pfPersonal_ExperienciaDocenteEditarForm');

Route:: post('/Personal_ExperienciaInnovadoraGuardar','Controller_Personal@fpPersonal_ExperienciaInnovadoraGuardar');
Route:: post('/Personal_ExperienciaInnovadoraConsultar','Controller_Personal@fpPersonal_ExperienciaInnovadoraConsultar');
Route:: post('/Personal_ExperienciaInnovadoraEliminar','Controller_Personal@pfPersonal_ExperienciaInnovadoraEliminar');
Route:: post('/Personal_ExperienciaInnovadoraEditarForm','Controller_Personal@pfPersonal_ExperienciaInnovadoraEditarForm');

Route:: post('/Personal_CursoTallerGuardar','Controller_Personal@fpPersonal_CursoTallerGuardar');
Route:: post('/Personal_CursoTallerConsultar','Controller_Personal@fpPersonal_CursoTallerConsultar');
Route:: post('/Personal_CursoTallerEliminar','Controller_Personal@pfPersonal_CursoTallerEliminar');
Route:: post('/Personal_CursoTallerEditarForm','Controller_Personal@pfPersonal_CursoTallerEditarForm');

Route:: post('/Personal_ExperienciaDisenoCurricularGuardar','Controller_Personal@fpPersonal_ExperienciaDisenoCurricularGuardar');
Route:: post('/Personal_ExperienciaDisenoCurricularConsultar','Controller_Personal@fpPersonal_ExperienciaDisenoCurricularConsultar');
Route:: post('/Personal_ExperienciaDisenoCurricularEliminar','Controller_Personal@pfPersonal_ExperienciaDisenoCurricularEliminar');
Route:: post('/Personal_ExperienciaDisenoCurricularEditarForm','Controller_Personal@pfPersonal_ExperienciaDisenoCurricularEditarForm');

Route:: post('/Personal_ExperienciaInvestigacionGuardar','Controller_Personal@fpPersonal_ExperienciaInvestigacionGuardar');
Route:: post('/Personal_ExperienciaInvestigacionConsultar','Controller_Personal@fpPersonal_ExperienciaInvestigacionConsultar');
Route:: post('/Personal_ExperienciaInvestigacionEliminar','Controller_Personal@pfPersonal_ExperienciaInvestigacionEliminar');
Route:: post('/Personal_ExperienciaInvestigacionEditarForm','Controller_Personal@pfPersonal_ExperienciaInvestigacionEditarForm');

Route:: post('/Personal_ExperienciaVinculacionGuardar','Controller_Personal@fpPersonal_ExperienciaVinculacionGuardar');
Route:: post('/Personal_ExperienciaVinculacionConsultar','Controller_Personal@fpPersonal_ExperienciaVinculacionConsultar');
Route:: post('/Personal_ExperienciaVinculacionEliminar','Controller_Personal@pfPersonal_ExperienciaVinculacionEliminar');
Route:: post('/Personal_ExperienciaVinculacionEditarForm','Controller_Personal@pfPersonal_ExperienciaVinculacionEditarForm');

Route:: post('/Personal_PublicacionesGuardar','Controller_Personal@fpPersonal_PublicacionesGuardar');
Route:: post('/Personal_PublicacionesConsultar','Controller_Personal@fpPersonal_PublicacionesConsultar');
Route:: post('/Personal_PublicacionesEliminar','Controller_Personal@pfPersonal_PublicacionesEliminar');
Route:: post('/Personal_PublicacionesEditarForm','Controller_Personal@pfPersonal_PublicacionesEditarForm');

Route:: post('/Personal_ParticipacionPonenteGuardar','Controller_Personal@fpPersonal_ParticipacionPonenteGuardar');
Route:: post('/Personal_ParticipacionPonenteConsultar','Controller_Personal@fpPersonal_ParticipacionPonenteConsultar');
Route:: post('/Personal_ParticipacionPonenteEliminar','Controller_Personal@pfPersonal_ParticipacionPonenteEliminar');
Route:: post('/Personal_ParticipacionPonenteEditarForm','Controller_Personal@pfPersonal_ParticipacionPonenteEditarForm');

Route:: post('/Personal_DiscapacidadGuardar','Controller_Personal@fpPersonal_DiscapacidadGuardar');
Route:: post('/Personal_DiscapacidadConsultar','Controller_Personal@fpPersonal_DiscapacidadConsultar');
Route:: post('/Personal_DiscapacidadEliminar','Controller_Personal@pfPersonal_DiscapacidadEliminar');
Route:: post('/Personal_DiscapacidadEditarForm','Controller_Personal@pfPersonal_DiscapacidadEditarForm');


Route:: post('/SeLengua','Controller_Personal@fpSeLengua');
Route:: post('/SeDepartamento','Controller_Personal@fpSeDepartamento');







Route:: get('/Sede','Controller_Sede@pfSede');
Route:: post('/SedeGuardar','Controller_Sede@pfSedeGuardar');
Route:: post('/SedeEliminar','Controller_Sede@pfSedeEliminar');
Route:: post('/SedeEditarForm','Controller_Sede@pfSedeEditarForm');

Route:: get('/Puesto','Controller_Puesto@pfPuesto');
Route:: post('/PuestoGuardar','Controller_Puesto@pfPuestoGuardar');
Route:: post('/PuestoEliminar','Controller_Puesto@pfPuestoEliminar');
Route:: post('/PuestoEditarForm','Controller_Puesto@pfPuestoEditarForm');

Route:: get('/CategoriaPuesto','Controller_CategoriaPuesto@pfCategoriaPuesto');
Route:: post('/CategoriaPuestoGuardar','Controller_CategoriaPuesto@pfCategoriaPuestoGuardar');
Route:: post('/CategoriaPuestoEliminar','Controller_CategoriaPuesto@pfCategoriaPuestoEliminar');
Route:: post('/CategoriaPuestoEditarForm','Controller_CategoriaPuesto@pfCategoriaPuestoEditarForm');

Route:: get('/TipoContrato','Controller_TipoContrato@pfTipoContrato');
Route:: post('/TipoContratoGuardar','Controller_TipoContrato@pfTipoContratoGuardar');
Route:: post('/TipoContratoEliminar','Controller_TipoContrato@pfTipoContratoEliminar');
Route:: post('/TipoContratoEditarForm','Controller_TipoContrato@pfTipoContratoEditarForm');

Route:: get('/SuperiorJerarquico','Controller_SuperiorJerarquico@pfSuperiorJerarquico');
Route:: post('/SuperiorJerarquicoGuardar','Controller_SuperiorJerarquico@pfSuperiorJerarquicoGuardar');
Route:: post('/SuperiorJerarquicoEliminar','Controller_SuperiorJerarquico@pfSuperiorJerarquicoEliminar');
Route:: post('/SuperiorJerarquicoEditarForm','Controller_SuperiorJerarquico@pfSuperiorJerarquicoEditarForm');


Route:: get('/Departamento','Controller_Departamento@pfDepartamento');
Route:: post('/DepartamentoGuardar','Controller_Departamento@pfDepartamentoGuardar');
Route:: post('/DepartamentoEliminar','Controller_Departamento@pfDepartamentoEliminar');
Route:: post('/DepartamentoEditarForm','Controller_Departamento@pfDepartamentoEditarForm');


Route:: get('/Pais','Controller_Pais@pfPais');
Route:: post('/PaisGuardar','Controller_Pais@pfPaisGuardar');
Route:: post('/PaisEliminar','Controller_Pais@pfPaisEliminar');
Route:: post('/PaisEditarForm','Controller_Pais@pfPaisEditarForm');


Route:: get('/Entidad','Controller_Entidad@pfEntidad');
Route:: post('/EntidadGuardar','Controller_Entidad@pfEntidadGuardar');
Route:: post('/EntidadEliminar','Controller_Entidad@pfEntidadEliminar');
Route:: post('/EntidadEditarForm','Controller_Entidad@pfEntidadEditarForm');

Route:: get('/Municipio','Controller_Municipio@pfMunicipio');
Route:: post('/MunicipioGuardar','Controller_Municipio@pfMunicipioGuardar');
Route:: post('/MunicipioEliminar','Controller_Municipio@pfMunicipioEliminar');
Route:: post('/MunicipioEditarForm','Controller_Municipio@pfMunicipioEditarForm');

Route:: get('/Localidad','Controller_Localidad@pfLocalidad');
Route:: post('/LocalidadGuardar','Controller_Localidad@pfLocalidadGuardar');
Route:: post('/LocalidadEliminar','Controller_Localidad@pfLocalidadEliminar');
Route:: post('/LocalidadEditarForm','Controller_Localidad@pfLocalidadEditarForm');

Route:: get('/DocumentoClasificacion','Controller_DocumentoClasificacion@pfDocumentoClasificacion');
Route:: post('/DocumentoClasificacionGuardar','Controller_DocumentoClasificacion@pfDocumentoClasificacionGuardar');
Route:: post('/DocumentoClasificacionEliminar','Controller_DocumentoClasificacion@pfDocumentoClasificacionEliminar');
Route:: post('/DocumentoClasificacionEditarForm','Controller_DocumentoClasificacion@pfDocumentoClasificacionEditarForm');


Route:: get('/Documentos','Controller_Documentos@pfDocumentos');
Route:: post('/DocumentosGuardar','Controller_Documentos@pfDocumentosGuardar');
Route:: post('/DocumentosEliminar','Controller_Documentos@pfDocumentosEliminar');
Route:: post('/DocumentosEditarForm','Controller_Documentos@pfDocumentosEditarForm');

Route:: get('/Lengua','Controller_Lengua@pfLengua');
Route:: post('/LenguaGuardar','Controller_Lengua@pfLenguaGuardar');
Route:: post('/LenguaEliminar','Controller_Lengua@pfLenguaEliminar');
Route:: post('/LenguaEditarForm','Controller_Lengua@pfLenguaEditarForm');

Route:: get('/Discapacidad','Controller_Discapacidad@pfDiscapacidad');
Route:: post('/DiscapacidadGuardar','Controller_Discapacidad@pfDiscapacidadGuardar');
Route:: post('/DiscapacidadEliminar','Controller_Discapacidad@pfDiscapacidadEliminar');
Route:: post('/DiscapacidadEditarForm','Controller_Discapacidad@pfDiscapacidadEditarForm');

Route:: get('/ConocimientoComputo','Controller_ConocimientoComputo@pfConocimientoComputo');
Route:: post('/ConocimientoComputoGuardar','Controller_ConocimientoComputo@pfConocimientoComputoGuardar');
Route:: post('/ConocimientoComputoEliminar','Controller_ConocimientoComputo@pfConocimientoComputoEliminar');
Route:: post('/ConocimientoComputoEditarForm','Controller_ConocimientoComputo@pfConocimientoComputoEditarForm');

Route:: get('/FormacionBasica','Controller_FormacionBasica@pfFormacionBasica');
Route:: post('/FormacionBasicaGuardar','Controller_FormacionBasica@pfFormacionBasicaGuardar');
Route:: post('/FormacionBasicaEliminar','Controller_FormacionBasica@pfFormacionBasicaEliminar');
Route:: post('/FormacionBasicaEditarForm','Controller_FormacionBasica@pfFormacionBasicaEditarForm');

Route:: get('/VinculacionNivelParticipacion','Controller_VinculacionNivelParticipacion@pfVinculacionNivelParticipacion');
Route:: post('/VinculacionNivelParticipacionGuardar','Controller_VinculacionNivelParticipacion@pfVinculacionNivelParticipacionGuardar');
Route:: post('/VinculacionNivelParticipacionEliminar','Controller_VinculacionNivelParticipacion@pfVinculacionNivelParticipacionEliminar');
Route:: post('/VinculacionNivelParticipacionEditarForm','Controller_VinculacionNivelParticipacion@pfVinculacionNivelParticipacionEditarForm');

Route:: get('/InvestigacionNivelParticipacion','Controller_InvestigacionNivelParticipacion@pfInvestigacionNivelParticipacion');
Route:: post('/InvestigacionNivelParticipacionGuardar','Controller_InvestigacionNivelParticipacion@pfInvestigacionNivelParticipacionGuardar');
Route:: post('/InvestigacionNivelParticipacionEliminar','Controller_InvestigacionNivelParticipacion@pfInvestigacionNivelParticipacionEliminar');
Route:: post('/InvestigacionNivelParticipacionEditarForm','Controller_InvestigacionNivelParticipacion@pfInvestigacionNivelParticipacionEditarForm');

Route:: get('/Empresa','Controller_Empresa@pfEmpresa');
Route:: post('/EmpresaGuardar','Controller_Empresa@pfEmpresaGuardar');
Route:: post('/EmpresaEliminar','Controller_Empresa@pfEmpresaEliminar');
Route:: post('/EmpresaEditarForm','Controller_Empresa@pfEmpresaEditarForm');


Route:: get('/EstadoCivil','Controller_EstadoCivil@pfEstadoCivil');
Route:: post('/EstadoCivilGuardar','Controller_EstadoCivil@pfEstadoCivilGuardar');
Route:: post('/EstadoCivilEliminar','Controller_EstadoCivil@pfEstadoCivilEliminar');
Route:: post('/EstadoCivilEditarForm','Controller_EstadoCivil@pfEstadoCivilEditarForm');





/*Catalgo Area Formacion */
Route:: get('/AreaFormacion','Controller_AreaFormacion@pfAreaFormacion');
Route:: post('/AreaFormacionGuardar','Controller_AreaFormacion@pfAreaFormacionGuardar');
Route:: post('/AreaFormacionEliminar','Controller_AreaFormacion@pfAreaFormacionEliminar');
Route:: post('/AreaFormacionEditarForm','Controller_AreaFormacion@pfAreaFormacionEditarForm');

/*Catalgo Postgrado tipo */
Route:: get('/PostgradoTipo','Controller_PostgradoTipo@pfPostgradoTipo');
Route:: post('/PostgradoTipoGuardar','Controller_PostgradoTipo@pfPostgradoTipoGuardar');
Route:: post('/PostgradoTipoEliminar','Controller_PostgradoTipo@pfPostgradoTipoEliminar');
Route:: post('/PostgradoTipoEditarForm','Controller_PostgradoTipo@pfPostgradoTipoEditarForm');

/*Catalgo Postgrado Situación */
Route:: get('/PostgradoSituacion','Controller_PostgradoSituacion@pfPostgradoSituacion');
Route:: post('/PostgradoSituacionGuardar','Controller_PostgradoSituacion@pfPostgradoSituacionGuardar');
Route:: post('/PostgradoSituacionEliminar','Controller_PostgradoSituacion@pfPostgradoSituacionEliminar');
Route:: post('/PostgradoSituacionEditarForm','Controller_PostgradoSituacion@pfPostgradoSituacionEditarForm');

/*Catalogo Carreras*/
Route:: get('/Carrera','Controller_Carrera@pfCarrera');
Route:: post('/CarreraGuardar','Controller_Carrera@pfCarreraGuardar');
Route:: post('/CarreraEliminar','Controller_Carrera@pfCarreraEliminar');
Route:: post('/CarreraEditarForm','Controller_Carrera@pfCarreraEditarForm');

/*Catalogo Eje Formacion*/
Route:: get('/EjeFormacion','Controller_EjeFormacion@pfEjeFormacion');
Route:: post('/EjeFormacionGuardar','Controller_EjeFormacion@pfEjeFormacionGuardar');
Route:: post('/EjeFormacionEliminar','Controller_EjeFormacion@pfEjeFormacionEliminar');
Route:: post('/EjeFormacionEditarForm','Controller_EjeFormacion@pfEjeFormacionEditarForm');

/*Catalogo Generacion*/
Route:: get('/Generacion','Controller_Generacion@pfGeneracion');
Route:: post('/GeneracionGuardar','Controller_Generacion@pfGeneracionGuardar');
Route:: post('/GeneracionEliminar','Controller_Generacion@pfGeneracionEliminar');
Route:: post('/GeneracionEditarForm','Controller_Generacion@pfGeneracionEditarForm');

/*
Route:: get('/PersonalConsulta','PersonalController@pfPersonalConsulta');
Route:: get('/PersonalAltaGuardar','PersonalController@pfPersonalAltaGuardar');
*/


//ESTADISTICAS

Route:: get('/Indicadores_RecursosHumanos','Controller_Indicadores@pfRecursosHumanos');

Route:: get('/Esta_RH_AreaFormacion','Controller_Indicadores@pfEsta_RH_AreaFormacion');
Route:: get('/Esta_RH_Edad','Controller_Indicadores@pfEsta_RH_Edad');
Route:: get('/Esta_RH_Antiguedad','Controller_Indicadores@pfEsta_RH_Antiguedad');
Route:: get('/Esta_RH_TiempoDedicacion','Controller_Indicadores@pfEsta_RH_TiempoDedicacion');
Route:: get('/Esta_RH_NivelEstudio','Controller_Indicadores@pfEsta_RH_NivelEstudio');
Route:: get('/Esta_RH_General','Controller_Indicadores@pfEsta_RH_General');
Route:: get('/Esta_RH_INEGI','Controller_Indicadores@pfEsta_RH_INEGI');
Route:: post('/Esta_RH_INEGI_Generar','Controller_Indicadores@pfEsta_RH_INEGI_Generar');

Route:: get('/Esta_REC_PersonalTipo','Controller_Indicadores@pfEsta_REC_PersonalTipo');



//BI

//Route:: get('/BI_RH_General','Controller_BI@pfBI_RH_General');
Route:: get('/BI_RH_Personal','Controller_BI@pfBI_RH_Personal');



//Alumno

Route:: get('/SE_Alumno','Controller_Alumno@pfSE_Alumno');
Route:: post('/SE_Alumno_Consultar','Controller_Alumno@pfSE_Alumno_Consultar');
Route:: post('/SeCarrGeneracion','Controller_Alumno@pfSeCarrGeneracion');


//Titulacion
Route:: get('/Titulacion_Alta','Controller_Titulacion@pfTitulacion_Alta');

