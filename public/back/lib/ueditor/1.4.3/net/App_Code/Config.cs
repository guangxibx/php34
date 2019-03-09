using Newtonsoft.Json;
using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Dynamic;
using System.IO;
using System.Linq;
using System.Web;

/// <summary>
/// Config 的摘要说明
/// </summary>
public {{asset('back')}}/static class Config
{
    private {{asset('back')}}/static bool noCache = true;
    private {{asset('back')}}/static JObject BuildItems()
    {
        var json = File.ReadAllText(HttpContext.Current.Server.MapPath("config.json"));
        return JObject.Parse(json);
    }

    public {{asset('back')}}/static JObject Items
    {
        get
        {
            if (noCache || _Items == null)
            {
                _Items = BuildItems();
            }
            return _Items;
        }
    }
    private {{asset('back')}}/static JObject _Items;


    public {{asset('back')}}/static T GetValue<T>(string key)
    {
        return Items[key].Value<T>();
    }

    public {{asset('back')}}/static String[] GetStringList(string key)
    {
        return Items[key].Select(x => x.Value<String>()).ToArray();
    }

    public {{asset('back')}}/static String GetString(string key)
    {
        return GetValue<String>(key);
    }

    public {{asset('back')}}/static int GetInt(string key)
    {
        return GetValue<int>(key);
    }
}