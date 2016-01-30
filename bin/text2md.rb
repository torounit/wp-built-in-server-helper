#!/usr/bin/env ruby
txtpath = File.join(File.dirname(__FILE__), "../readme.txt");
mdpath = File.join(File.dirname(__FILE__), "../readme.md");

badges = <<"EOS"
[![Build Status](https://travis-ci.org/torounit/wp-built-in-server-helper.svg)](https://travis-ci.org/torounit/wp-built-in-server-helper)
[![](https://img.shields.io/wordpress/plugin/dt/built-in-server-helper.svg)](https://wordpress.org/plugins/built-in-server-helper/)
[![](https://img.shields.io/wordpress/v/built-in-server-helper.svg)](https://wordpress.org/plugins/built-in-server-helper/)
[![](https://img.shields.io/wordpress/plugin/r/built-in-server-helper.svg)](https://wordpress.org/plugins/built-in-server-helper/)

EOS

string = File.read(txtpath, :encoding => Encoding::UTF_8);

string.gsub!( /^===\s([^=]+)\s===/, '# \1')
string.gsub!(/^==\s([^=]+)\s==/, '## \1')
string.gsub!(/^=\s([^=]+)\s=\r?\n?\*/, '### \1'+"\n\n\*")
string.gsub!(/^=\s([^=]+)\s=/, '### \1')
string.gsub!(/(Contributors:)/, "\n"+'\1')
string.gsub!(/(Tags:)/, "\n"+'\1')
string.gsub!(/(Requires at least:)/, "\n"+'\1')
string.gsub!(/(Tested up to:)/, "\n"+'\1')
string.gsub!(/(Stable tag:)/, "\n"+'\1')
string.gsub!(/(Donate link:)/, "\n"+'\1')
string.gsub!(/(License:)/, "\n"+'\1')
string.gsub!(/(License URI:)/, "\n"+'\1')
string.gsub!(/## Description/, "\n"+badges+"\n"+"## Description")

File.write(mdpath, string);