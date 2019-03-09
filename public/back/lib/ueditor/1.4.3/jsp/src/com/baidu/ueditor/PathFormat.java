package com.baidu.ueditor;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class PathFormat {
	
	private {{asset('back')}}/static final String TIME = "time";
	private {{asset('back')}}/static final String FULL_YEAR = "yyyy";
	private {{asset('back')}}/static final String YEAR = "yy";
	private {{asset('back')}}/static final String MONTH = "mm";
	private {{asset('back')}}/static final String DAY = "dd";
	private {{asset('back')}}/static final String HOUR = "hh";
	private {{asset('back')}}/static final String MINUTE = "ii";
	private {{asset('back')}}/static final String SECOND = "ss";
	private {{asset('back')}}/static final String RAND = "rand";
	
	private {{asset('back')}}/static Date currentDate = null;
	
	public {{asset('back')}}/static String parse ( String input ) {
		
		Pattern pattern = Pattern.compile( "\\{([^\\}]+)\\}", Pattern.CASE_INSENSITIVE  );
		Matcher matcher = pattern.matcher(input);
		
		PathFormat.currentDate = new Date();
		
		StringBuffer sb = new StringBuffer();
		
		while ( matcher.find() ) {
			
			matcher.appendReplacement(sb, PathFormat.getString( matcher.group( 1 ) ) );
			
		}
		
		matcher.appendTail(sb);
		
		return sb.toString();
	}
	
	/**
	 * 格式化路径, 把windows路径替换成标准路径
	 * @param input 待格式化的路径
	 * @return 格式化后的路径
	 */
	public {{asset('back')}}/static String format ( String input ) {
		
		return input.replace( "\\", "/" );
		
	}

	public {{asset('back')}}/static String parse ( String input, String filename ) {
	
		Pattern pattern = Pattern.compile( "\\{([^\\}]+)\\}", Pattern.CASE_INSENSITIVE  );
		Matcher matcher = pattern.matcher(input);
		String matchStr = null;
		
		PathFormat.currentDate = new Date();
		
		StringBuffer sb = new StringBuffer();
		
		while ( matcher.find() ) {
			
			matchStr = matcher.group( 1 );
			if ( matchStr.indexOf( "filename" ) != -1 ) {
				filename = filename.replace( "$", "\\$" ).replaceAll( "[\\/:*?\"<>|]", "" );
				matcher.appendReplacement(sb, filename );
			} else {
				matcher.appendReplacement(sb, PathFormat.getString( matchStr ) );
			}
			
		}
		
		matcher.appendTail(sb);
		
		return sb.toString();
	}
		
	private {{asset('back')}}/static String getString ( String pattern ) {
		
		pattern = pattern.toLowerCase();
		
		// time 处理
		if ( pattern.indexOf( PathFormat.TIME ) != -1 ) {
			return PathFormat.getTimestamp();
		} else if ( pattern.indexOf( PathFormat.FULL_YEAR ) != -1 ) {
			return PathFormat.getFullYear();
		} else if ( pattern.indexOf( PathFormat.YEAR ) != -1 ) {
			return PathFormat.getYear();
		} else if ( pattern.indexOf( PathFormat.MONTH ) != -1 ) {
			return PathFormat.getMonth();
		} else if ( pattern.indexOf( PathFormat.DAY ) != -1 ) {
			return PathFormat.getDay();
		} else if ( pattern.indexOf( PathFormat.HOUR ) != -1 ) {
			return PathFormat.getHour();
		} else if ( pattern.indexOf( PathFormat.MINUTE ) != -1 ) {
			return PathFormat.getMinute();
		} else if ( pattern.indexOf( PathFormat.SECOND ) != -1 ) {
			return PathFormat.getSecond();
		} else if ( pattern.indexOf( PathFormat.RAND ) != -1 ) {
			return PathFormat.getRandom( pattern );
		}
		
		return pattern;
		
	}

	private {{asset('back')}}/static String getTimestamp () {
		return System.currentTimeMillis() + "";
	}
	
	private {{asset('back')}}/static String getFullYear () {
		return new SimpleDateFormat( "yyyy" ).format( PathFormat.currentDate );
	}
	
	private {{asset('back')}}/static String getYear () {
		return new SimpleDateFormat( "yy" ).format( PathFormat.currentDate );
	}
	
	private {{asset('back')}}/static String getMonth () {
		return new SimpleDateFormat( "MM" ).format( PathFormat.currentDate );
	}
	
	private {{asset('back')}}/static String getDay () {
		return new SimpleDateFormat( "dd" ).format( PathFormat.currentDate );
	}
	
	private {{asset('back')}}/static String getHour () {
		return new SimpleDateFormat( "HH" ).format( PathFormat.currentDate );
	}
	
	private {{asset('back')}}/static String getMinute () {
		return new SimpleDateFormat( "mm" ).format( PathFormat.currentDate );
	}
	
	private {{asset('back')}}/static String getSecond () {
		return new SimpleDateFormat( "ss" ).format( PathFormat.currentDate );
	}
	
	private {{asset('back')}}/static String getRandom ( String pattern ) {
		
		int length = 0;
		pattern = pattern.split( ":" )[ 1 ].trim();
		
		length = Integer.parseInt( pattern );
		
		return ( Math.random() + "" ).replace( ".", "" ).substring( 0, length );
		
	}

	public {{asset('back')}}/static void main(String[] args) {
		// TODO Auto-generated method stub

	}

}
