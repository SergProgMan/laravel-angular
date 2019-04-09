Angular​ + Laravel​ ​ Exercise
App is a ​ ​ single-page​ ​ application​ ​ that​ ​ displays​ ​ the​ ​ tournament's​ ​ results.
The​ tournament​​ participants​​ (the​ "players")​​ have​ each​​ achieved​ a​ score,​​ ranging​ from​ 0​ up​​ to​​ 150​​ points.
API​​ specification:
Each​ player​ has​ four​ properties
- "id" - the player's​​ numeric​ identifier,​ its​​ value​ ​is​ unique​ to​​ the​ player
- "name"​ -​ player's​ name
- "level"​​ -​ player's​​ competition​ category,​ ​either​ a​ rookie,​ ​an​ amateur,​ or​​ a​ pro
- "score"​​ - player's​ tournament​ result
- “Suspected”​ - true/false​​ -​ is​​ player​​ suspected​​ or​ not
The​​ API​ is​ available​​ via​ the​ following​​ endpoints:
GET​ /api/v1/players?start=<num>&n=<num>
The​ response​​ is​​ a list​ of​ players​​ in​ JSON​ format,​ as​ demonstrated​ by​ the​ example​ list​ below:
[
{
​ ​ ​ "name":​​ "alice",
​ ​ ​ "level":​ "rookie",
​ ​ ​ "score":​ 84,
    “Suspected”:​ true,
​ ​ ​ "id":​ ​1
},
{
​    "name":​ ​"bob",
    "level":​ ​"pro",
    "score":​ ​136,
    “Suspected”: false,
​ ​ ​  "id":​ 2
}
]
The​​ two​ obligatory​ query​​ parameters​​ are:
- "start"​ -​ position​ ​of​​ the​ ​first​ ​player​ to​ include​ in​ the​ response
- "n"​ -​ count,​​ number​ ​of​ ​players​ ​to​ include​ in​ the​ response
In​​ addition​ to​ that,​​ there​ ​are​ 2​ more​ optional​ query​ parameters​​ supported:
- "level"​ ​- ​filter​ ​by​​ player​​ level​ (level=rookie​​ returns​ only​​ players​​ who​​ are​​ rookies)
- "search"​​ - ​free​ ​search​ ​on​ ​all​ ​the​​ player's​ ​attributes​ ​- ​name,​ level,​ ​id​ ​and​​ score
The​ ​total​​count​ ​of​​ players​​ that​ ​fit​ ​the​​ query​​ filters​​ is​ returned​​ in​ the​ ​response​ header, via​ ​the​ ​field​ ​x-total.
### Adding​ client​​ side​ ​files​ to​​ the​ server:
The​ web​​ application​ ​ :
- Has​ to​​ contain​ a form​ to​ add​ new​ player​​ details
- has​ to​ contain​ a​ table​ to​​ display​ ​the​ results,​ a​ row​ for​ each​ player,​ with​ 4 columns​​ showing​​ all player's​ ​attributes​ -​ id,​ name,​ level​ ​and​ ​score.

The​​ table​ ​has​ an​​ option​ of​ filtering​ by​ level,​​ to​ display​ only​​ the​​ players​ that​ ​have​ a certain level.​ Please​ make​ the ​ filter​ ​selection​ ​available​ ​on​ the​ ​corresponding​ column​ ​header.
- the​ ​table​ should​ have​​ a ​free​​ search​ ​input,​ ​to​ allow​​ the​​ user​​ to​ ​type​​ a ​search​​ phrase.​​ The​​ table displays​ only ​ these​ ​players​ that​​ the​ search​ phrase​​ is​ a​ substring​ of​ their​​ name,​ ​their​ id,​ their​​ level​ ​or their​ score.
- Player​ ​names​​ should​ ​always​ be​ capitalized
- Players​ that​​ are​ suspected​​ of​ ​cheating​ need​ to​ have​ a​ clear​ ​ table indication​ ​- the​​ entire​ row​ containing​​ the​ player’s details​ ​should​ be “highlighted”.​ ​Freely​ choose​ how​​ to​​ visually​​ create​ the​ distinguishing​ effect​​ of​ cheaters​ (colors,​ fonts
etc...)​​ to​​ make​ it​ clear​ the​​ player​​ is​​ a​​ suspect.