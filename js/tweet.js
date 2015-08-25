
$(document).ready(function(){getTwitters('deadTweets',{id:document.getElementById('tweeter').innerHTML,prefix:'',clearContents:false,count:3,withFriends:true,ignoreReplies:true,clearContents:true,newwindow:true});});function twitterCounter(twitters){var usercount=twitters[0].user.followers_count
document.getElementById('twitter_counter').innerHTML=usercount;}