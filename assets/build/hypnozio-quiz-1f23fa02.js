import"./circle-progress-e0904202.js";import{m as A}from"./module.esm-958008ac.js";import{m as P}from"./module.esm-3f6ffe0c.js";import{$ as B}from"./jquery-2c3981e2.js";import{v as k}from"./million-verifier-5f829d6b.js";import"./jquery-68c15ecd.js";import"./_commonjsHelpers-de833af9.js";const W="!text-danger",I=[0];A.plugin(P);A.data("hypnozioQuiz",(_,C,G,x,y)=>({init(){this.questionKey=0,this.questionIndex=this.questionKey+1,this.totalQuestions=Object.keys(_).length,this.correctedTotalQuestions=_[Object.keys(_).length-1].questionKey,this.question=_[0],this.data={gender:localStorage.getItem("userGender"),metrics:{imperial_height_feet:"",imperial_height_inches:"",imperial_weight:"",imperial_desired_weight:"",metric_height:"",metric_weight:"",metric_desired_weight:""},answers:{},score:{},email:"",password:"",password_confirmation:"",activity:"",encodedScore:"",encodedAnswers:""},this.bmi=0,this.questions=_,this.selectButtonLabels=G,this.fitnessMotivationFlow=y},uncheckOtherInputs(e){document.querySelectorAll('input[name="'+e+'"]').forEach(r=>{r.checked=!1})},checkAnswers(e){setTimeout(()=>{this.question.type==="metrics_form"&&setTimeout(()=>{document.getElementById("imperial_height_feet").focus()});const n=document.querySelectorAll('input[name="'+e+'"]');this.data.answers[this.questionKey]!==void 0?Object.keys(this.data.answers[this.questionKey]).forEach(p=>{n.forEach(E=>{E.getAttribute("data-text")===p&&(E.checked=!0)})}):n.forEach(r=>{r.checked=!1})})},nextQuestion(){var r,p,E,g,m;const e=(p=(r=_[this.questionKey])==null?void 0:r.answers)==null?void 0:p.filter(t=>t.text===this.data.answers[this.questionKey].answerText),n=this.questionKey;this.questionKey=this.questionKey+1,e&&(this.questionKey=((E=Object.values(e)[0])==null?void 0:E.nextQuestionIndex)??this.questionKey),_[n].nextQuestionIndex&&(this.questionKey=_[n].nextQuestionIndex),I.includes(this.questionKey)||I.push(this.questionKey),this.questionIndex=this.questionKey+1,this.checkAnswers(this.questionKey),(g=_[this.questionKey])!=null&&g.questionKey&&(this.questionIndex=(m=_[this.questionKey])==null?void 0:m.questionKey),this.question=_[this.questionKey],document.body.scrollTop=document.documentElement.scrollTop=0,this.question.type==="end_card"&&this.sendHypnozioQuizEmailStepVisitedEvent()},previousQuestion(){var n,r;const e=I.findIndex(p=>p===this.questionKey);this.questionKey=I[e-1],this.questionIndex=this.questionKey+1,(n=_[this.questionKey])!=null&&n.questionKey&&(this.questionIndex=(r=_[this.questionKey])==null?void 0:r.questionKey),this.checkAnswers(this.questionKey),this.question=this.questions[this.questionKey],document.body.scrollTop=document.documentElement.scrollTop=0,I.pop()},answerQuestion(e,n){if(this.question.type!=="select")this.data.answers[this.questionKey]={[e]:n,answerText:e},this.data.score[this.questionKey]=n,this.totalQuestions!==this.questionKey+1&&this.nextQuestion();else if(this.question.type==="select"){if(e===this.selectButtonLabels.none||e===this.selectButtonLabels.not_sure||e===this.selectButtonLabels.none_of_above){this.data.answers[this.questionKey]={[e]:0},this.data.score[this.questionKey]=0,this.uncheckOtherInputs(this.questionKey);return}typeof this.data.answers[this.questionKey]>"u"||Object.keys(this.data.answers[this.questionKey]).length===0?(this.data.answers[this.questionKey]={[e]:{answerText:n}},this.data.score[this.questionKey]=n):typeof this.data.answers[this.questionKey][e]<"u"?(Reflect.deleteProperty(this.data.answers[this.questionKey],e),Object.keys(this.data.answers[this.questionKey]).length===0&&Reflect.deleteProperty(this.data.score,this.questionKey)):this.data.answers[this.questionKey]=Object.assign(this.data.answers[this.questionKey],{[e]:{answerText:n}}),this.data.answers[this.questionKey][this.selectButtonLabels.none]!==void 0&&(delete this.data.answers[this.questionKey][this.selectButtonLabels.none],this.uncheckOtherInputs(this.questionKey)),this.data.answers[this.questionKey][this.selectButtonLabels.not_sure]!==void 0&&(delete this.data.answers[this.questionKey][this.selectButtonLabels.not_sure],this.uncheckOtherInputs(this.questionKey)),this.data.answers[this.questionKey][this.selectButtonLabels.none_of_above]!==void 0&&(delete this.data.answers[this.questionKey][this.selectButtonLabels.none_of_above],this.uncheckOtherInputs(this.questionKey))}this.checkAnswers(this.questionKey)},calculateBmi(e){const n=e==="imperial"?4.4:2;if(e==="imperial"&&this.data.metrics.imperial_desired_weight>=n&&this.data.metrics.imperial_desired_weight!==""){let r=this.data.metrics.imperial_height_inches!==""?parseInt(this.data.metrics.imperial_height_inches,10):0,p=this.data.metrics.imperial_height_feet*12+r;return this.bmi=this.data.metrics.imperial_desired_weight/(p*p)*703,this.bmi}if(e==="metric"&&this.data.metrics.metric_desired_weight>=n&&this.data.metrics.metric_desired_weight!==""){let r=this.data.metrics.metric_height/100;return this.bmi=this.data.metrics.metric_desired_weight/(r*r),this.bmi}},addClasses(e,n){for(const r of n)e.classList.add(r)},removeClasses(e,n){for(const r of n)e.classList.remove(r)},addSiblingElementClasses(e,n){for(const r of n)e.nextElementSibling.classList.add(r)},removeSiblingElementClasses(e,n){for(const r of n)e.nextElementSibling.classList.remove(r)},validateRequired(e){const n=e==="imperial"?1433:650,r=e==="imperial"?5:2,p=e==="imperial"?1400:635,E=e==="imperial"?4.7:2.1,g=e==="imperial"?"lb":"kg",m=document.createElement("span"),t=document.getElementById(e==="imperial"?"imperial_weight":"metric_weight"),l=document.getElementById(e==="imperial"?"imperial_desired_weight":"metric_desired_weight"),d=["!border-danger","!border-2"],s=["peer-focus:text-danger"],o=document.getElementById("email");if(e==="imperial"){const f=document.getElementById("imperial_height_feet"),w=document.getElementById("imperial_height_inches");if(this.data.metrics.imperial_height_feet===""||this.data.metrics.imperial_height_feet<=2||this.data.metrics.imperial_height_feet>9)return this.addClasses(f,d),this.addSiblingElementClasses(f,s),!1;if(this.removeClasses(f,d),this.removeSiblingElementClasses(f,s),this.data.metrics.imperial_height_inches==="")return this.addClasses(w,d),this.addSiblingElementClasses(w,s),!1;if(this.removeClasses(w,d),this.removeSiblingElementClasses(w,s),this.data.metrics.imperial_weight==="")return this.addClasses(t,d),this.addSiblingElementClasses(t,s),!1;if(this.removeClasses(t,d),this.removeSiblingElementClasses(t,s),parseInt(this.data.metrics.imperial_weight)>n)return this.addClasses(t,d),this.addSiblingElementClasses(t,s),m.innerHTML=C.heaviest_person_fact.replace(":EXAMPLEMAXWEIGHT",p+" "+g).replace(":MAXWEIGHT",n+" "+g),this.addClasses(m,s),t.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&t.parentElement.appendChild(m),!1;if(t.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&t.parentElement.lastElementChild.remove(),this.removeClasses(t,d),this.removeSiblingElementClasses(t,s),parseInt(this.data.metrics.imperial_weight)<r)return this.addClasses(t,d),this.addSiblingElementClasses(t,s),m.innerHTML=C.lightest_person_fact.replace(":EXAMPLEMINWEIGHT",E+" "+g).replace(":MINWEIGHT",r+" "+g),this.addClasses(m,s),t.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&t.parentElement.appendChild(m),!1;if(t.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&t.parentElement.lastElementChild.remove(),this.removeClasses(t,d),this.removeSiblingElementClasses(t,s),this.data.metrics.imperial_desired_weight==="")return this.addClasses(l,d),this.addSiblingElementClasses(l,s),!1;if(this.removeClasses(t,d),this.removeSiblingElementClasses(l,s),parseInt(this.data.metrics.imperial_desired_weight)>n)return this.addClasses(l,d),this.addSiblingElementClasses(l,s),m.innerHTML=C.heaviest_person_fact.replace(":EXAMPLEMAXWEIGHT",p+" "+g).replace(":MAXWEIGHT",n+" "+g),this.addClasses(m,s),l.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&l.parentElement.appendChild(m),!1;if(l.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&l.parentElement.lastElementChild.remove(),this.removeClasses(t,d),this.removeSiblingElementClasses(l,s),parseInt(this.data.metrics.imperial_desired_weight)<r)return this.addClasses(l,d),this.addSiblingElementClasses(l,s),m.innerHTML=C.lightest_person_fact.replace(":EXAMPLEMINWEIGHT",E+" "+g).replace(":MINWEIGHT",r+" "+g),this.addClasses(m,s),l.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&l.parentElement.appendChild(m),!1;l.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&l.parentElement.lastElementChild.remove(),this.removeClasses(t,d),this.removeSiblingElementClasses(l,s)}if(e==="metric"){const f=document.getElementById("metric_height");if(this.data.metrics.metric_height===""||this.data.metrics.metric_height<=50||this.data.metrics.metric_height>250)return this.addClasses(f,d),this.addSiblingElementClasses(f,s),!1;if(this.removeClasses(f,d),this.removeSiblingElementClasses(f,s),this.data.metrics.metric_weight==="")return this.addClasses(t,d),this.addSiblingElementClasses(t,s),!1;if(this.removeClasses(t,d),this.removeSiblingElementClasses(t,s),parseInt(this.data.metrics.metric_weight)>n)return this.addClasses(t,d),this.addSiblingElementClasses(t,s),m.innerHTML=C.heaviest_person_fact.replace(":EXAMPLEMAXWEIGHT",p+" "+g).replace(":MAXWEIGHT",n+" "+g),this.addClasses(m,s),t.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&t.parentElement.appendChild(m),!1;if(t.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&t.parentElement.lastElementChild.remove(),this.removeClasses(t,d),this.removeSiblingElementClasses(t,s),parseInt(this.data.metrics.metric_weight)<r)return this.addClasses(t,d),this.addSiblingElementClasses(t,s),m.innerHTML=C.lightest_person_fact.replace(":EXAMPLEMINWEIGHT",E+" "+g).replace(":MINWEIGHT",r+" "+g),this.addClasses(m,s),t.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&t.parentElement.appendChild(m),!1;if(t.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&t.parentElement.lastElementChild.remove(),this.removeClasses(t,d),this.removeSiblingElementClasses(t,s),this.data.metrics.metric_desired_weight==="")return this.addClasses(l,d),this.addSiblingElementClasses(l,s),!1;if(this.removeClasses(t,d),this.removeSiblingElementClasses(l,s),parseInt(this.data.metrics.metric_desired_weight)>n)return this.addClasses(l,d),this.addSiblingElementClasses(l,s),m.innerHTML=C.heaviest_person_fact.replace(":EXAMPLEMAXWEIGHT",p+" "+g).replace(":MAXWEIGHT",n+" "+g),this.addClasses(m,s),l.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&l.parentElement.appendChild(m),!1;if(l.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&l.parentElement.lastElementChild.remove(),this.removeClasses(t,d),this.removeSiblingElementClasses(l,s),parseInt(this.data.metrics.metric_desired_weight)<r)return this.addClasses(l,d),this.addSiblingElementClasses(l,s),m.innerHTML=C.lightest_person_fact.replace(":EXAMPLEMINWEIGHT",E+" "+g).replace(":MINWEIGHT",r+" "+g),this.addClasses(m,s),l.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&l.parentElement.appendChild(m),!1;l.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&l.parentElement.lastElementChild.remove(),this.removeClasses(t,d),this.removeSiblingElementClasses(l,s)}return!!this.validateEmailByPattern(o)},validateOnKeyUp(e){const n=e==="imperial"?8.11:272,r=e==="imperial"?23:57,p=e==="imperial"?1433:650,E=e==="imperial"?5:2,g=e==="imperial"?22.4:57,m=e==="imperial"?8.11:272,t=e==="imperial"?1400:635,l=e==="imperial"?4.7:2.1,d=e==="imperial"?"in":"cm",s=e==="imperial"?"lb":"kg",o=document.createElement("span"),f=document.createElement("div");f.setAttribute("id","height_error");const w=document.getElementById("imperial_height_feet"),b=document.getElementById("imperial_height_inches"),u=document.getElementById(e==="imperial"?"imperial_height_feet":"metric_height"),L=document.getElementById("imperial_height_wrapper"),c=document.getElementById(e==="imperial"?"imperial_weight":"metric_weight"),i=document.getElementById(e==="imperial"?"imperial_desired_weight":"metric_desired_weight"),h=["!border-danger","!border-2"],a=["!text-danger","peer-focus:text-danger"],q=document.getElementById("bmi-error-card-metric"),H=document.getElementById("bmi-error-card-imperial"),N=document.getElementById("weight-error-card-imperial"),S=document.getElementById("weight-error-card-metrics"),M=document.getElementById("weight-equal-error-card-imperial"),T=document.getElementById("weight-equal-error-card-metrics"),v=18.5;if(e==="imperial"){const X=this.data.metrics.imperial_height_inches!==""?parseInt(this.data.metrics.imperial_height_inches):0;let K=(this.data.metrics.imperial_height_feet!==""?parseInt(this.data.metrics.imperial_height_feet):0)+X/100;if(K<r/100&&K!==0)return this.addClasses(w,h),this.addClasses(b,h),this.addSiblingElementClasses(w,a),this.addSiblingElementClasses(b,a),f.innerHTML=C.smallest_person_fact.replace(":EXAMPLEMINHEIGHT",g+" "+d).replace(":MINHEIGHT",r+" "+d),this.addClasses(f,a),document.getElementById("height_error")||L.parentNode.insertBefore(f,L.nextSibling),!1;if(document.getElementById("height_error")&&document.getElementById("height_error").remove(),this.removeClasses(w,h),this.removeClasses(b,h),this.removeSiblingElementClasses(w,a),this.removeSiblingElementClasses(b,a),K>n)return this.addClasses(w,h),this.addClasses(b,h),this.addSiblingElementClasses(w,a),this.addSiblingElementClasses(b,a),f.innerHTML=C.tallest_person_fact.replace(":EXAMPLEMAXHEIGHT",m+" "+d).replace(":MAXHEIGHT",n+" "+d),this.addClasses(f,a),document.getElementById("height_error")||L.parentNode.insertBefore(f,L.nextSibling),!1;if(document.getElementById("height_error")&&document.getElementById("height_error").remove(),this.removeClasses(w,h),this.removeClasses(b,h),this.removeSiblingElementClasses(w,a),this.removeSiblingElementClasses(b,a),parseInt(this.data.metrics.imperial_weight)>p)return this.addClasses(c,h),this.addSiblingElementClasses(c,a),o.innerHTML=C.heaviest_person_fact.replace(":EXAMPLEMAXWEIGHT",t+" "+s).replace(":MAXWEIGHT",p+" "+s),this.addClasses(o,a),c.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&c.parentElement.appendChild(o),!1;if(c.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&c.parentElement.lastElementChild.remove(),this.removeClasses(c,h),this.removeSiblingElementClasses(c,a),parseInt(this.data.metrics.imperial_weight)<E)return this.addClasses(c,h),this.addSiblingElementClasses(c,a),o.innerHTML=C.lightest_person_fact.replace(":EXAMPLEMINWEIGHT",l+" "+s).replace(":MINWEIGHT",E+" "+s),this.addClasses(o,a),c.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&c.parentElement.appendChild(o),!1;if(c.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&c.parentElement.lastElementChild.remove(),this.removeClasses(c,h),this.removeSiblingElementClasses(c,a),parseInt(this.data.metrics.imperial_desired_weight)>p)return M.classList.add("hidden"),this.addClasses(i,h),this.addSiblingElementClasses(i,a),o.innerHTML=C.heaviest_person_fact.replace(":EXAMPLEMAXWEIGHT",t+" "+s).replace(":MAXWEIGHT",p+" "+s),this.addClasses(o,a),i.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&i.parentElement.appendChild(o),!1;if(i.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&i.parentElement.lastElementChild.remove(),this.removeClasses(c,h),this.removeSiblingElementClasses(i,a),parseInt(this.data.metrics.imperial_desired_weight)<E)return this.addClasses(i,h),this.addSiblingElementClasses(i,a),o.innerHTML=C.lightest_person_fact.replace(":EXAMPLEMINWEIGHT",l+" "+s).replace(":MINWEIGHT",E+" "+s),this.addClasses(o,a),i.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&i.parentElement.appendChild(o),!1;i.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&i.parentElement.lastElementChild.remove(),this.removeClasses(c,h),this.removeSiblingElementClasses(i,a),this.data.metrics.imperial_desired_weight===""&&(this.removeClasses(i,h),this.removeSiblingElementClasses(i,a)),this.data.metrics.imperial_desired_weight!==""&&this.data.metrics.imperial_weight!==""&&this.calculateBmi(e),this.data.metrics.imperial_desired_weight!==""&&this.data.metrics.imperial_weight!==""&&this.bmi<v?(H.classList.remove("hidden"),this.addClasses(i,h),this.addSiblingElementClasses(i,a)):this.data.metrics.imperial_desired_weight!==""&&this.bmi>=v&&(H.classList.add("hidden"),this.removeClasses(i,h),this.removeSiblingElementClasses(i,a)),y?this.data.metrics.imperial_desired_weight!==""&&this.data.metrics.imperial_weight!==""&&Number(this.data.metrics.imperial_desired_weight)===Number(this.data.metrics.imperial_weight)?(M.classList.remove("hidden"),this.addClasses(i,h),this.addSiblingElementClasses(i,a)):M.classList.add("hidden"):this.data.metrics.imperial_desired_weight!==""&&this.data.metrics.imperial_weight!==""&&Number(this.data.metrics.imperial_desired_weight)>=Number(this.data.metrics.imperial_weight)?(N.classList.remove("hidden"),this.addClasses(i,h),this.addSiblingElementClasses(i,a)):this.data.metrics.imperial_desired_weight!==""&&this.data.metrics.imperial_weight!==""&&Number(this.data.metrics.imperial_desired_weight)<Number(this.data.metrics.imperial_weight)&&(N.classList.add("hidden"),this.removeClasses(i,h),this.removeSiblingElementClasses(i,a)),(this.data.metrics.imperial_desired_weight===""||this.data.metrics.imperial_weight==="")&&(H.classList.add("hidden"),N.classList.add("hidden"))}if(e==="metric"){if(parseInt(this.data.metrics.metric_height)<r)return u.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&u.parentElement.lastElementChild.remove(),this.addClasses(u,h),this.addSiblingElementClasses(u,a),o.innerHTML=C.smallest_person_fact.replace(":EXAMPLEMINHEIGHT",g+" "+d).replace(":MINHEIGHT",r+" "+d),this.addClasses(o,a),u.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&u.parentElement.appendChild(o),!1;if(u.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&u.parentElement.lastElementChild.remove(),this.removeClasses(u,h),this.removeSiblingElementClasses(u,a),parseInt(this.data.metrics.metric_height)>n)return this.addClasses(u,h),this.addSiblingElementClasses(u,a),o.innerHTML=C.tallest_person_fact.replace(":EXAMPLEMAXHEIGHT",m+" "+d).replace(":MAXHEIGHT",n+" "+d),this.addClasses(o,a),u.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&u.parentElement.appendChild(o),!1;if(u.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&u.parentElement.lastElementChild.remove(),this.removeClasses(u,h),this.removeSiblingElementClasses(u,a),parseInt(this.data.metrics.metric_desired_weight)>p)return this.addClasses(i,h),this.addSiblingElementClasses(i,a),o.innerHTML=C.heaviest_person_fact.replace(":EXAMPLEMAXWEIGHT",t+" "+s).replace(":MAXWEIGHT",p+" "+s),this.addClasses(o,a),i.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&i.parentElement.appendChild(o),!1;if(c.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&c.parentElement.lastElementChild.remove(),this.removeClasses(c,h),this.removeSiblingElementClasses(c,a),parseInt(this.data.metrics.metric_weight)<E)return this.addClasses(c,h),this.addSiblingElementClasses(c,a),o.innerHTML=C.lightest_person_fact.replace(":EXAMPLEMINWEIGHT",l+" "+s).replace(":MINWEIGHT",E+" "+s),this.addClasses(o,a),c.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&c.parentElement.appendChild(o),!1;if(c.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&c.parentElement.lastElementChild.remove(),this.removeClasses(c,h),this.removeSiblingElementClasses(c,a),parseInt(this.data.metrics.metric_desired_weight)>p)return this.addClasses(i,h),this.addSiblingElementClasses(i,a),T.classList.add("hidden"),o.innerHTML=C.heaviest_person_fact.replace(":EXAMPLEMAXWEIGHT",t+" "+s).replace(":MAXWEIGHT",p+" "+s),this.addClasses(o,a),i.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&i.parentElement.appendChild(o),!1;if(i.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&i.parentElement.lastElementChild.remove(),this.removeClasses(c,h),this.removeSiblingElementClasses(i,a),parseInt(this.data.metrics.metric_desired_weight)<E)return this.addClasses(i,h),this.addSiblingElementClasses(i,a),o.innerHTML=C.lightest_person_fact.replace(":EXAMPLEMINWEIGHT",l+" "+s).replace(":MINWEIGHT",E+" "+s),this.addClasses(o,a),i.parentElement.lastElementChild.tagName.toLowerCase()!=="span"&&i.parentElement.appendChild(o),!1;i.parentElement.lastElementChild.tagName.toLowerCase()==="span"&&i.parentElement.lastElementChild.remove(),this.removeClasses(c,h),this.removeSiblingElementClasses(i,a),this.data.metrics.metric_desired_weight===""&&(this.removeClasses(i,h),this.removeSiblingElementClasses(i,a)),this.data.metrics.metric_desired_weight!==""&&this.data.metrics.metric_weight!==""&&this.calculateBmi(e),this.data.metrics.metric_desired_weight!==""&&this.data.metrics.metric_weight!==""&&this.bmi<v?(q.classList.remove("hidden"),this.addClasses(i,h),this.addSiblingElementClasses(i,a)):this.data.metrics.metric_desired_weight!==""&&this.bmi>=v&&(q.classList.add("hidden"),this.removeClasses(i,h),this.removeSiblingElementClasses(i,a)),y?this.data.metrics.metric_desired_weight!==""&&this.data.metrics.metric_weight!==""&&Number(this.data.metrics.metric_desired_weight)===Number(this.data.metrics.metric_weight)?(T.classList.remove("hidden"),this.addClasses(i,h),this.addSiblingElementClasses(i,a)):T.classList.add("hidden"):this.data.metrics.metric_desired_weight!==""&&this.data.metrics.metric_weight!==""&&Number(this.data.metrics.metric_desired_weight)>=Number(this.data.metrics.metric_weight)?(S.classList.remove("hidden"),this.addClasses(i,h),this.addSiblingElementClasses(i,a)):this.data.metrics.metric_desired_weight!==""&&this.data.metrics.metric_weight!==""&&Number(this.data.metrics.metric_desired_weight)<Number(this.data.metrics.metric_weight)&&(S.classList.add("hidden"),this.removeClasses(i,h),this.removeSiblingElementClasses(i,a)),(this.data.metrics.metric_desired_weight===""||this.data.metrics.metric_weight==="")&&(q.classList.add("hidden"),S.classList.add("hidden"))}},validateEmailByPattern(e,n="^[^\\s@]+@[^\\s@]+?\\.[^\\s@]+$"){let r=document.querySelector('[for="'+e.id+'"]');function p(){e.classList.add("!border-danger","!border-2","peer-focus:text-danger"),r.classList.add(W)}function E(){e.classList.remove("!border-danger","!border-2","peer-focus:text-danger"),r.classList.remove(W)}function g(t){const l=document.createElement("div");l.innerHTML=t,l.classList.add("error-span","text-danger","text-label-medium","font-normal","mt-2"),e.parentNode.insertBefore(l,e.nextSibling)}function m(){document.querySelector(".error-span")!==null&&document.querySelectorAll(".error-span").forEach(function(l){l.parentNode.removeChild(l)})}if(e.value===""){if(p(),document.querySelector(".error-span")===null){g(typeof C!==void 0?C.required:errorMessages.required);return}}else E(),m();return e.value.match(n)===null?(p(),document.querySelector(".error-span")!==null?e.value===""?document.querySelector(".error-span").innerHTML=typeof C!==void 0?C.required:errorMessages.required:document.querySelector(".error-span").innerHTML=typeof C!==void 0?C.incorrect:errorMessages.incorrect:g(typeof C!==void 0?C.incorrect:errorMessages.incorrect),e.dataset.validated=!1,!1):(e.dataset.validated=!0,E(),m(),!0)},async validateEmailDeliverability(){const e=document.getElementById("email");return await k(e.value,x)},showProgressCircle(e){const n=document.getElementById("quiz-wrapper"),r=document.getElementById("quiz-progress-wrapper"),p=document.getElementsByClassName("svg-class");document.getElementById("cta");let E=0;const g=15e3;n.style.display="none",r.style.display="block";function m(){const l=p[E];l&&(l.classList.remove("hidden"),E=E+1)}function t(l){B(l).circleProgress({fill:{color:"#3A5BA9"},startAngle:-Math.PI/2,emptyFill:"#DAE2FF",animation:{duration:g}}).on("circle-animation-progress",function(d,s,o){B(this).find(".percentage").text(parseInt(100*o)+"%"),100*o/33>=E+1&&m()})}t(".round"),setTimeout(()=>{e.submit()},g+1e3)},sendHypnozioQuizEmailStepVisitedEvent(){if(typeof dataLayer<"u"){let n=function(){dataLayer.push({event:e,date:Date()})};const e="quiz-email-step-visited";n()}},submitForm(e,n,r,p,E,g){let m=!1;if(m=r?!0:p||E?this.validateEmailByPattern(e.email):this.validateRequired(n),g&&_[15].answerText!=="Weight loss"&&(m=!0),m)this.data.encodedScore=JSON.stringify(this.data.score),this.data.encodedAnswers=JSON.stringify(this.data.answers),setTimeout(()=>{this.showProgressCircle(e)});else return!1},submitFormTiktok(e){this.data.score=JSON.stringify(this.data.score),this.data.answers=JSON.stringify(this.data.answers),setTimeout(()=>{this.showProgressCircle(e)})}}));A.start();
